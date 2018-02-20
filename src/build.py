import os, shutil

class Template:
  '''
  Structure for storing a string, or list of strings, and replacing specified
  keys in the string(s) with dynamic values.
  '''

  def __init__(self,src):
    self.src  = src
    self.load_content()

  def get_content(self):
    return self.content

  def load_content(self):
    '''
    Load the intial content for this template from the associated file.
    '''
    with open(self.src,'r') as f:
      self.content = f.read()

  def get_sub_content(self, dic):
    '''
    Get self.content and do some substitutions without modifying this instance.
    '''
    # check for same broadcast size, if any
    # i.e. do we need to write the same value to several keys?
    argsizes = list(set([listlen(value) for key,value in dic.iteritems()]))
    assert len(argsizes) <= 2
    N = max(argsizes)
    # initial copying for broadcast
    content = [self.content[:] for i in range(N)]
    for key, value in dic.iteritems():
      # broadcast the value if singular
      if listlen(value) is 1:
        value = [value for i in range(N)]
      # write the substitutions
      for i in range(N):
        content[i] = content[i].replace(make_key(key),value[i])
    content = ''.join(content)
    return content

  def set_sub_content(self, keys):
    '''
    Overwrite self.content in this instance with some substitutions.
    '''
    self.content = self.get_sub_content(keys)

def make_key(str):
  '''
  Make a standard key (for finding and substituting the key with some value).
  '''
  return '__'+str+'__'

def find_keys(str):
  '''
  Find any keys in the string.
  Return full keys (formatted) and also truncated base keys.
  '''
  keys = re.findall(make_key('(.*?)'),str)
  base = [k.split(':')[0] for k in keys]
  return keys,base

def error(msg):
  print "   ERROR: "+msg+"\n   See -h option for help."
  sys.exit(1)

def update(msg):
  print " + "+msg

def vupdate(msg,verbose=False):
  if verbose:
    print " | "+msg

def listlen(obj):
  '''
  Hack-ish workaround for inconsistency of strings / lists of strings.
  '''
  if isinstance(obj,list):
    return len(obj)
  elif isinstance(obj,str):
    return 1
  elif isinstance(obj,unicode):
    return 1
  else:
    return 0

def make_pagename(name):
  return name.replace('index','home').capitalize()

def get_templates(dirname):
  T = {}
  for (path,dirs,files) in os.walk(dirname):
    for f in files:
      pagename = os.path.splitext(f)[0]
      T.update({pagename:Template(os.path.join(path,f))})
  return T

if __name__ == "__main__":
  out = os.path.join('..','web')
  pages = get_templates('pages')
  templates = get_templates('templates')
  for name, page in pages.iteritems():
    sub = {k:t.get_sub_content({'title':make_pagename(name)})
      for k,t in templates.iteritems()}
    with open(os.path.join(out,name+'.php'),'w') as f:
      f.write(page.get_sub_content(sub))
  for (path,dirs,files) in os.walk('scripts'):
    for f in files:
      ftype = os.path.splitext(f)[1][1:]
      src = os.path.join(path,f)
      dst = os.path.join(out,ftype.replace('php',''),f)
      shutil.copyfile(src,dst)
