# Installation

1. This repo uses nginx proxy manager by default.
1. it is recommended to run a docker proxy server in addition to this repo.
1. the proxy repo is located [here](https://github.com/JohnAwesomeJr/proxy-server)
1. start proxy server docker repo `docker-compose up -d`
1. run this docker repo `docker-compose up -d`
1. find out mysql container id `docker ps`
1. find out what the name of the client docker ip is (it is usually something like "docker-server-template_client_1")
1. add a new host in the proxy manager
1. set the doamin name to eather your domain or localhost.
1. set the Forward Hostname to the docker container ip address (usually "docker-server-template_client_1")
1. if you want backend access from your front end you may consider adding a new host for the backend server container in addition to the client server.
1. to run your `.sql` migrating file, place it in the "dump" folder.
1. name it "schema_dump.sql" there is already an example in the folder. But you can replace it with your own ".sql" migration file.
1. enter into the mysql docker container `docker exec -it <CONTAINER ID> bash`
1. migrate the database `mysql -u root -ptest mydb < /host-machine/schema_dump.sql`
1. exit out of of the container `exit`

1. if you are in development and want to create a migration just log back into the database container using the steps above and run this cammand. ```mysqldump -u root -ptest mydb > /host-machine/schema_dump.sql```
1. you can also do the same thing with no data in the tables like this ```mysqldump -u root -ptest --no-data mydb > /host-machine/schema_dump.sql```
