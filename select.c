#include<stdio.h>
#include<conio.h>

void selection(int a[], int n){
	int i,j,temp,min,loc;
	
	for(i=0;i<n;i++){
		min=a[i];
		loc=i;
		for(j=i+1;j<n;j++){
			if(a[j]<a[i]){
				min=a[j];
				loc = j;
			}
		}
		temp= a[i];
		a[i]= min;
		a[j]= temp;
	}
}

void display(int arr[], int n){
		for(int i=0;i<n;i++){
			printf("%d\t",arr[i]);
			printf("\n");
		}
}


int main(){
	int arr[] = {9,5,22,7,3,8,0};
	int size = sizeof(arr)/sizeof(arr[0]);
	selection(arr,size);
	display(arr,size);
	return 0;
}
