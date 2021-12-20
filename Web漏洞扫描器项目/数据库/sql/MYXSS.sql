prompt Importing table MYXSS...
set feedback off
set define off
insert into MYXSS (ID, XSS)
values ('2', '%3CSCRIPT%3Ealert%28%22');

insert into MYXSS (ID, XSS)
values ('3', 'javascript%3Aalert%28%22');

insert into MYXSS (ID, XSS)
values ('1', ');%3C/script%3E%3Cscript%3Ealert(%');

prompt Done.
