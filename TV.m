function grad_min=TV(A,eps,dx)
R=racine(A,eps,dx);
[h,w]=size(A);
Term1=(A-A([2 1 1:h-2],:))./R([1 1:h-1],:);
Term2=(A([3:h h h-1],:)-A)./R([2:h h],:);
Term3=(A-A(:,[2 1 1:w-2]))./R(:,[1 1:w-1]);
Term4=(A(:,[3:w w w-1])-A)./R(:,[2:w w]);
grad_min=1/4*(Term1-Term2+Term3-Term4);

