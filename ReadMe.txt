What's the class?
There are two class, Driver class and RicartAgrawalaAlg class in Client package.
Two class,server class and ReadFile class in Server package.

Client:
The driver class initial a client and create RicartAgrawalaAlg(with Roucairol-carvalho optimization)
 object to handle Ricart-Agrawala algorithm for distributed mutual exclusion.

1 At the initial function Driver{}: create socket channel link to other 4 client and create 4 thread to listen
2 requestCS: use RicartAgrawalaAlg object to request critical section and enter it.
3 criticalSection: enter critical section, link to 3 server and operate read/write action.
4 ChannelHandler: listen to other 4 client, handle the request/reply message received from them
5 ServerHandler: listen to server, when get 3 message from server, then release token.

PS: the MyFile.txt will record the time each client enter Critical section and end critical Section.(millisecond)
We can check the end time of the client, and the start time of the next client. So to ensure that each time only
one client enter critical section.

How to run?
run the file in out folder, out/production/Myproject1/Client,out/production/Myproject1/Server

run server.class with 1 as argument
run server.class with 2 as argument
run server.class with 3 as argument

run Driver.class with 1 as argument
run Driver.class with 2 as argument
run Driver.class with 3 as argument
run Driver.class with 4 as argument
run Driver.class with 5 as argument  (must run in order)


Server:
server will start listen, each time a client link, it will create a thread to handle it.
This thread will write "client number, client timestamp" into serverFile.txt. Then read
the last line of serverFile.txt and return to the client.

each server folder will store serverFile.txt