function G=gradient_TP(U,V,r)
k=fspecial('disk',r);
H=imfilter(U,k,'conv','sym');
G=imfilter(H-V,k,'conv','sym');
