
//calculates the N-th term
//for a given N

import java.util.*;
import java.lang.*;

public class Pattern{
	static List<Integer> user_input = new ArrayList<Integer>();
	static List<Integer> prime_list = new ArrayList<Integer>();
	static List<Integer> solution_arrayList = new ArrayList<Integer>();


	//generate prime numbers
	//in the range; min -max user input
	static void generatePrime(){
      int i =0;
      int num =0;

      int last_value = user_input.get(user_input.size()-1); // last value
      int first_element = user_input.get(0);
      for (i = first_element; i <= last_value; i++)
      {
         int counter=0;
         for(num =i; num>=1; num--)
         {
	    if(i%num==0)
	    {
		counter +=1;
	    }
	 }
	 if (counter ==2)
	 {

	    prime_list.add(i);
	 }
      }
   }

//calculate the nearest 
// to current value of user input
 
	
public static void series() {

   for(int key:user_input){
    int index = Collections.binarySearch(prime_list, key);
    int closest;
    int nTh_term =0;
    if (index >= 0) {
        closest = prime_list.get(index);
        nTh_term = Math.abs(key - closest);
        solution_arrayList.add(nTh_term);
    } else {
        index = -index - 1;
        if (index == 0){
            closest = prime_list.get(index);
            nTh_term = Math.abs(key - closest);
        	solution_arrayList.add(nTh_term);
            
        } else if (index == prime_list.size()){
            closest = prime_list.get(index - 1);
            nTh_term = Math.abs(key - closest);
        	solution_arrayList.add(nTh_term);
        } else {
             
            int prev = prime_list.get(index - 1);
            int next = prime_list.get(index);
            
            int prev_diff = Math.abs(key - prev);
            int next_diff = Math.abs(key-next);
            
            if(prev_diff > next_diff){
                closest = next;
                solution_arrayList.add(next_diff);
            }
          
            else if (prev_diff<=next_diff){
                closest = prev;
                solution_arrayList.add(prev_diff);
            }
            else{
                closest = prev;
                solution_arrayList.add(prev_diff);
            }
            
            
            
        }
    }
} 
}




	public static void main(String[] args){
		Scanner scan = new Scanner(System.in);
		System.out.println("Input:");
		int test_case = scan.nextInt();
		int place_holder = 0;


		if(1<=test_case || test_case <=200){
		for(int i=0;i<test_case;i++){
			//System.out.println("value:");
			int input_value = scan.nextInt();
			if(input_value>=1 || input_value<=1000000){
				place_holder = input_value;
				user_input.add(place_holder);
				place_holder = 0;

		}

	}

	}

	Collections.sort(user_input); // Sorts list in ascending order
	generatePrime(); //generate all posible prime numbers in the range [N,10^6] / [first_prime,10^6] - if N < first_prime
	series();
	
	System.out.println();
	System.out.println("Output");
	for(int g:solution_arrayList){
		System.out.println(g);
	}

		}
	}
