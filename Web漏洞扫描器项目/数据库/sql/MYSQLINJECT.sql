prompt Importing table MYSQLINJECT...
set feedback off
set define off
insert into MYSQLINJECT (ID, SQLINJECT)
values ('1', '-1%27+');

insert into MYSQLINJECT (ID, SQLINJECT)
values ('2', ' '''' or ''''1''''=''''1');

insert into MYSQLINJECT (ID, SQLINJECT)
values ('3', '-1'' or 1=1 #');

insert into MYSQLINJECT (ID, SQLINJECT)
values ('4', '-1%27+or+1%3D1+%23');

insert into MYSQLINJECT (ID, SQLINJECT)
values ('5', '-1+%27+union+select+database%28%29%2Cuser%28%29+%23');

prompt Done.
