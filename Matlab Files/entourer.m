function M=entourer(A)
[k,l]=size(A);
%initialisation
M=zeros(k+4, l+4);
%corps de la matrice
M(3:k+2,3:l+2)=A;
%premier contour, ligne
M(2,3:l+2)=A(1,:);
M(k+3,3:l+2)=A(k,:);
%2ème contour ligne
M(1,3:l+2)=A(2,:);
M(k+4,3:k+2)=A(k-1,:);
%premier contour colonne
M(3:k+2,2)=A(:,1);
M(3:k+2,l+3)=A(:,l);
%deuxième contour colonne
M(3:k+2,1)=A(:,2);
M(3:k+2,l+4)=A(:,l-1);
%coins
M(1,1)=A(2,2); M(1,2)=A(2,1); M(2,1)=A(1,2); M(2,2)=A(1,1);
M(k+4,l+4)=A(k-1,l-1); M(k+3,l+3)=A(k,l); M(k+3, l+4)=A(k+4,l+3); M(k+4, l+3)=A(k+3,l+4);
M(1,l+4)=A(k-2,l-2); M(1,l+3)=A(2,l); M(2, l+3)=A(1,l); 

