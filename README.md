The code is developed in PHP and assumes you have a phpredis library installed on the server to be used.

I have a written a Class - IPAddressDayCounter.php that initializes connections and has publicly accessible functions to register  & increment the frequency of an IP, get top100 common IPs and clear out the data for a previous date.

To use each function, create an object of the Class IPAddressDayCounter() and call the public functions.

To insert an IP address, call object->request_handled($ip) , where $ip is the IPv4 IP address format. 

To get Top 100 common IPs, call object->top100(), response comes back as a array of 100 objects in descending order of occurrence.

To clear the data for a previous date, call object->clear(). This resets all the data for the previous date.

Note: I have written a random IP freq increment logic also that is not in the scope of the task, but just for my testing purposes.
