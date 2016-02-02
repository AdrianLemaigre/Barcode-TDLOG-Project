function U=gradient_general(r,lambda,eps,dx, pas, it)
V = imread('cb.png');
U=V;
F=lambda*TV(U,eps,dx)+gradient_TP(U,V,r);
for k=1:it
   F=lambda*TV(U,eps,dx)+gradient_TP(U,V,r);
%    F=[zeros(h,2) F(:,3:w-2) zeros(h,2)];
%    F=[zeros(2,w); F(3:h-2,:); zeros(2,w)];
   U=U-pas*F;
end

clf
I=mat2gray(U);
imshow(I)
title=sprintf('deblurring4-%0.2f-%0.2f-%0.2f-%0.2f-%0.2f-%e.jpg',r,lambda,eps,dx, pas, it);
imwrite(I,title);