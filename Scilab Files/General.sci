//Puts symmetric borders with r ligns
function K = rounding(I, r)
    [h, w] = size(I);
    K = I
    for k = 1:r
        [i, j] = size(K);
        K = [K(1 + k*r, :); K ; K(h - k*r, :)];
        B1 = [K(1 + k*r, 1 + k*r); K([2:i+1], 1 + k*r); K(h - k*r, 1 + k*r)];
        B2 = [K(1 + k*r, w - k*r); K([2:i+1], w - k*r); K(h - k*r, w - k*r)];
        K = [ B1 K B2];
    end
    clear h;
    clear w;
    clear B1;
    clear B2;
endfunction

//Calculates a circular averaging filter
function K = filter_disk(r)
    K = ones(ceil(2*r +1), ceil(2*r + 1));
    S = 0;
    for i = 1: ceil(2*r + 1)
        for j = 1:ceil(2*r + 1)
            dist =(i - r - 1)**2 + (j - r - 1)**2
            if (dist > r**2) then
                K(i, j) = 0;
            else 
                S = S + 1;
            end
        end
    end
    K = K/S;
    clear dist;
endfunction

//Applies the given filter to the filtered original image minus the current image
function grad = TP(U, V, r)
    K = filter_disk(r);
    H = convol2d(K, rounding(U, ceil(r)));
    [h, w] = size(H)
    H = H([1 + 2*r :h - 2*r], [1 + 2*r : w - 2*r]);
    B = rounding(H-V, ceil(r));
    grad = convol2d(K, B);
    [h, w] = size(grad)
    grad = grad([1 + 2*r :h - 2*r], [1 + 2*r : w - 2*r]);
    clear K;
    clear H;
    clear B;
    clear h;
    clear w;
endfunction

//Square root of 1 + image**2
function R = racine(U, epsilon, dx)
    [h, w] = size(U);
    E = epsilon * epsilon * ones(h, w);
    R1 = (U([2:h h], :) - U([1 1:h-1], :))/(2*dx);
    R2 = (U(:, [2:w w]) - U(:, [1 1:w-1]))/(2*dx);
    R = E + R1.*R1 + R2.*R2;
    clear h;
    clear w;
    clear E;
    clear R1;
    clear R2;
endfunction

//Calculates the Frobenius norm
function N = norme(U)
    a = sum((diag(U*U')));
    N = sqrt(double(a))
endfunction

//Calculates the variation value (taux de variation)
function grad = TV(U, epsilon, dx)
    R = racine(U, epsilon, dx);
    [h, w] = size(U);
    T1=(U - U([2 1 1:h-2], :))./R([1 1:h-1], :);
    T2=(U([3:h h h-1], :) - U)./R([2:h h], :);
    T3=(U - U(:, [2 1 1:w-2]))./R(:, [1 1:w-1]);
    T4=(U(:, [3:w w w-1]) - U)./R(:, [2:w w]);
    grad = (T1 - T2 + T3 - T4)/4;
    clear h; 
    clear w; 
    clear R; 
    clear T1; 
    clear T2;
    clear T3; 
    clear T4;
endfunction

//General function
function U = reduction_flou(path, r, lambda, epsilon, dx, pas, seuil)
    V = imread(path);
    V = double(V);
    U = double(V);
    [h,w]=size(U);
    F = lambda * TV(U, epsilon, dx) + TP(U, V, r);
    while (norme(-pas*F)/norme(U) >= seuil)
        F = lambda * TV(U, epsilon, dx) + TP(U, V, r);
        U = U - pas*F
        for i=1:h
            for j=1:w
                if U(i,j) < 0 then
                    U(i,j) = 0;
                end
                if U(i,j) > 255 then
                    U(i,j) = 255;
                end
            end
        end
        Image = uint8(U);
        imshow(Image)
    end
    clf
    Image = uint8(U);
    imshow(Image)
endfunction
