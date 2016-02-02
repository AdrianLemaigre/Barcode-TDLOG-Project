function R=racine(A,eps,dx)
[h,w]=size(A);
Eps=eps*eps*ones(h,w);
Rprov=1/(2*dx)*(A([2:h h],:)-A([1 1:h-1],:));
Rprov2=Rprov.*Rprov;
Rprav=1/(2*dx)*(A(:,[2:w w])-A(:,[1 1:w-1]));
Rprav2=Rprav.*Rprav;
R=Eps+Rprav2+Rprov2;