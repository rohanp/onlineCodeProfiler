import pstats,cProfile
import sys
import pyximport
pyximport.install()

print(sys.argv[1])
exec("import %s"%sys.argv[1])

cProfile.runctx("%s.main()"%sys.argv[1], globals(), locals(), "cython_profile.prof")

s = pstats.Stats("cython_profile.prof")
s.strip_dirs().sort_stats("tottime").print_stats(10)
