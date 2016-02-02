#define _CRT_SECURE_NO_WARNINGS

#include<stdio.h>
#include<stdlib.h>

const int L = 13;

char* code_barre(int argc, char* argv[]){
    static char S[13];
    for (int i = 0; i < L; i++){ S[i] = '0'; }

    if (argc != 2){
        printf("Non correct number of arguments");
        S[0] = '2';
    }
    else{
        FILE* fichier;
        fichier = fopen(argv[1], "r");
        if (fichier != 0){ S[0] = '1'; }
        else{ S[0] = '2'; }
        fclose(fichier);
        }
    return S;
}

int main(int argc, char *argv[]){
    char* CB = code_barre(argc, argv);
    printf("%s", CB);
    //getchar();

    return 0;
}
