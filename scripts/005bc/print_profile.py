import pstats

s = pstats.Stats("bot_profile.prof")
s.strip_dirs().sort_stats("tottime").print_stats(10)