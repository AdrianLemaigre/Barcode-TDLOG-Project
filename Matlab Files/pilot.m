function Image=pilot(V, lambda, r, pas)
[h,w]=size(V)
U=ones(h,w);
F=gradient_general(U,V,r,lambda);


