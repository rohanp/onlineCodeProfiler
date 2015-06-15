#!/usr/bin/env python

def main():
	print("hello, world!")
	a, b = [1]*100000, [2,3,4,5,6]
	a[99995:100000] = b
	findFirst_python(a, b)
	a1, b1 = np.asarray(a), np.asarray(b)
	findFirst_numpy(a1, b1)

def findFirst_python(a, b):
    len_b = len(b)
    for i in range(len(a)):  
        if a[i:i+len_b] == b:
             return i 
def rolling_window(a, window):
    shape = a.shape[:-1] + (a.shape[-1] - window + 1, window)
    strides = a.strides + (a.strides[-1],)
    return np.lib.stride_tricks.as_strided(a, shape=shape, strides=strides)

def findFirst_numpy(a, b):
    temp = rolling_window(a, len(b))
    result = np.where(np.all(temp == b, axis=1))
    return result[0][0] if result else None

if __name__ == "__main__":
	main()

			