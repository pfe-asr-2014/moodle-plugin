FROM tutum/mysql

ADD moodle-data.sql /moodle-data.sql
ADD moodle-schema.sql /moodle-schema.sql

ENV STARTUP_SQL='/moodle.sql'

ENV MYSQL_USER=moodle
ENV MYSQL_PASS=moodle
