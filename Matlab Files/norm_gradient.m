function gradient=norm_gradient(A)
[h,w]=size(A);
%c'est bôoooooooooooooooooooooo <3
gradient=4*A-(A(:,[2:w w])+A(:,[1 1:w-1])+A([2:h h],:)+A([1 1:h-1],:));

