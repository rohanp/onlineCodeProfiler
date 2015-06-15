import pstats,cProfile
import sys
import pyximport
pyximport.install()

exec("import %s"%sys.argv[1][:-4])

cProfile.runctx("%s.main()"%sys.argv[1], globals(), locals(), "cython_profile.prof")

s = pstats.Stats("cython_profile.prof")
s.strip_dirs().sort_stats("tottime").print_stats(10)
