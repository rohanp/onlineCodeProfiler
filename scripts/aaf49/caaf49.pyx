#cython: profile=True
#cython: boundscheck=False
#cython: wraparound=False
#cython: cdivision=True

cimport numpy as np
cimport cython

def main():
	print("hello, world!")
	a[99995:100000] = b
	findFirst_python(a, b)
	a1, b1 = np.asarray(a), np.asarray(b)
	findFirst_cython(a1,b1)

cpdef int findFirst_cython(int [:] a, int [:] b):
    cdef int i, j
    cdef bint result
    for i in range(a.shape[0]):
        result = True
        for j in range(b.shape[0]):
            result = result and (a[i+j] == b[j])
            if not result:
                break
        if result:
            return i
    return 0
if __name__ == "__main__":
	main()
			