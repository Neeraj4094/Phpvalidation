use student;
-- CREATE TABLE IF NOT EXISTS Table1 (
--     id INT,
--     name VARCHAR(50),
--     email varchar(40)
-- );
-- insert into table (id,name,email) values (1,"Neeraj","neeraj@gmail.com");
-- select * from details;
-- insert into rec (id,name,email,password) values (2,"Sukhpal","sukhpal@gmail.com","Sukhpal@123");
-- insert into rec (id,name,email,password) values (3,"Shekhar","shekhar@gmail.com","Shekhar@123");

-- update record set email= "aman1@gmail.com" where name= "Aman" and email = "";
-- -- insert into record (id,name,email) values (7,"Sandeep","sandeep@gmail.com");
-- -- insert into record (id,name,email) values (6,"Kartik","kartik@gmail.com");
-- -- delete from record where name="sandeep";
-- -- update record set email = "" where name="Aman";
-- select * from record;
-- select * from record where email = "neeraj@gmail.com" limit 1;

-- select max(name) from record where email= "neeraj@gmail.com";
-- select sum(id) from record;
-- select * from record where name like "A_an";
-- select * from record where name in ('Neeraj',"Sukhpal","Shekhar","Ankur");
-- select * from record where id between 2 and 6 order by name;
-- select id , concat_ws(", ",name,email) as items from record ;
-- create table rec (id int(4),name varchar(255),email varchar(35),password varchar(12));
-- insert into rec (id,name,email,password) values (1, "Neeraj","neeraj@gmail.com","Neeraj@123");
-- select * from rec;
-- describe rec;
-- select i.id, i.name, i.email,r.id,r.password from record as i, rec as r where i.name=r.name and i.id=r.id;


-- select id from record;



-- Inner join
-- select r.id,i.name,r.email,r.password from rec as r inner join record as i on i.id=r.id;
 
-- create table [if not exists] details (id int(4) , name varchar(255), skill varchar(255), primary key (`id`));
-- insert into details (1,"Neeraj","neeraj@gmail.com");
-- select * from details;

-- select r.id, i.name,d.email from ((rec as r inner join record as i on r.id=i.id) inner join details as d on r.id=d.id);


-- select record.name from record left join rec on record.name=rec.name;

-- select record.name, rec.name from record,rec where rec.name == record.name ;
-- insert into table1 (id,name,email) values (1,"Neeraj","neeraj@gmail.com");

-- create table customer (id int not null, name varchar(100),email varchar(50));
-- insert into customer (id,name,email) values (1,"Neeraj","neeraj@gmail.com");
-- update customer set name= "Raj" where name="Neeraj";
-- select * from record;

-- union
-- select name from table1 union select email from customer;

-- group by
-- select count(id),name from rec group by name;


-- select count(id), email from record group by email having count(id) >=1 order by count(id) desc;
-- alter table customer add pasword varchar(16);
-- alter table customer drop column password;
select * from record as r right join rec as i on (r.id=i.id) ;