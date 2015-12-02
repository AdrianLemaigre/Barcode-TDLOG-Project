function U=gradient_easy(V,r,eps,dx, pas, it)
U=V;
F=gradient_TP(U,V,r);
while norm(-pas*F)/norm(U)>it
   F=gradient_TP(U,V,r);
%    F=[zeros(h,2) F(:,3:w-2) zeros(h,2)];
%    F=[zeros(2,w); F(3:h-2,:); zeros(2,w)];
   U=U-pas*F;
end

clf
I=mat2gray(U);
imshow(I)
title=sprintf('gradient_nul-%0.2f-%0.2f-%0.2f-%0.2f-%e.jpg',r,eps,dx, pas, it);
imwrite(I,title);