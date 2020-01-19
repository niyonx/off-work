drop database if exists hrm;
create database hrm;
use hrm;

SET SQL_SAFE_UPDATES = 0;

drop table if exists tbl_department;
create table tbl_department(
id int(11) auto_increment primary key,
dept_code varchar(10),
dept_name varchar(50),
dept_head int(11),
date_created datetime,
created_by int(11),
date_updated datetime,
updated_by int(11)
);

drop table if exists tbl_employee;
create table tbl_employee(
id int(11) auto_increment primary key,
d_id int(11) null,
designation varchar(100),
head int(11) null,
surname varchar(50),
firstname varchar(50),
email varchar(100),
`password` varchar(100),
phone varchar(30),
active tinyint(1),
admin tinyint(1) default 0,
cascade_approval tinyint(1) default 0,
address varchar(255),
date_of_entry datetime null default null,
date_of_exit datetime null default null,
NIC varchar(255),
DOB datetime null default null,
passport varchar(255),
kin_name varchar(255),
kin_phone varchar(30),
date_created datetime null default null,
created_by int(11),
date_updated datetime null default null,
updated_by int(11),
FOREIGN KEY (d_id) REFERENCES tbl_department(id) on update set null on delete set null);

drop table if exists tbl_leave_types;
create table tbl_leave_types(
id int(11) auto_increment primary key,
`name` varchar(20),
default_days float(10,1),
allowed_carryfwd_days float(10,1),
date_created datetime null default null,
created_by int(11),
date_updated datetime null default null,
updated_by int(11),
`status` varchar(20)
);

drop table if exists tbl_attachment;
create table tbl_attachment(
id int(11) auto_increment primary key,
active tinyint(1),
emp_id int(11),
attachment varchar(255),
date_created datetime null default null,
created_by int(11),
date_updated datetime null default null,
updated_by int(11),
FOREIGN KEY (emp_id) REFERENCES tbl_employee(id));

drop table if exists tbl_employee_leaves;
create table tbl_employee_leaves(
id int(11) auto_increment primary key,
emp_id int(11),
lt_id int(11),
days_entitled float(10,1),
days_taken float(10,1) default 0,
carry_fwd float(10,1) default 0,
prev_carry_fwd float(10,1) default 0,
date_created datetime null default null,
created_by int(11),
date_updated datetime null default null,
updated_by int(11),
FOREIGN KEY (emp_id) REFERENCES tbl_employee(id),
FOREIGN KEY (lt_id) REFERENCES tbl_leave_types(id) on update cascade on delete cascade);

drop table if exists tbl_leave_application;
create table tbl_leave_application(
id int(11) auto_increment primary key,
emp_id int(11),
lt_id int(11),
lt_id_copy int(11),
date_from date,
date_to date,
duration float(10,1),
reason text,
attachment varchar(255) default "",
`status` varchar(20),
half_day varchar(100) default "",
date_approved datetime null default null,
approved_by int(11),
date_cancelled datetime null default null,
cancelled_by int(11),
date_created datetime null default null,
created_by int(11),
date_updated datetime null default null,
updated_by int(11),
FOREIGN KEY (emp_id) REFERENCES tbl_employee(id),
FOREIGN KEY (lt_id) REFERENCES tbl_leave_types(id) on delete set null);

drop table if exists tbl_holidays;
create table tbl_holidays(
id int(11) auto_increment primary key,
holiday date,
holiday_name varchar(255));

-- drop table if exists tbl_leave_history;
-- create table tbl_leave_history(
-- id int(11) auto_increment primary key,
-- la_id int(11) ,
-- emp_id int(11),
-- lt_id int(11),
-- date_from date,
-- date_to date,
-- duration int(2),
-- reason text,
-- attachment varchar(255),
-- `status` varchar(20),
-- date_created timestamp default now(),
-- created_by int(11),
-- date_updated timestamp default now(),
-- updated_by int(11),
-- date_approved timestamp null default null,
-- approved_by int(11),
-- date_cancelled timestamp null default null,
-- cancelled_by int(11),
-- FOREIGN KEY (la_id) REFERENCES tbl_leave_application(id),
-- FOREIGN KEY (emp_id) REFERENCES tbl_employee(id),
-- FOREIGN KEY (lt_id) REFERENCES tbl_leave_types(id)
-- );

insert into tbl_holidays(holiday, holiday_name) values
('2018-01-01','New Year 1'),('2018-01-02','New Year 2'),('2018-01-31','Thaipoosam Cavadee'),
('2018-02-01','Abolition of slavery'),('2018-02-16','Spring Festival'),('2018-03-12','National Day'),
('2018-03-18','Ougadi'),('2018-05-01','Labour Day'),('2018-06-16','Eid-Ul-Fitr'),
('2018-09-14','Ganesh Chaturthi'),('2018-11-07','Divali'),('2018-12-25','Xmas');

insert into tbl_leave_types(`name`,default_days, `status`,allowed_carryfwd_days) values
('Annual leave', '22','yes',5),
('Sick leave', '15','yes',0),
('Study leave', '4','yes',0),
('Paternity leave', '5','yes',0),
('Maternity leave', '98','yes',0),
('Wedding leave', '5','yes',0);


insert into tbl_department(dept_code,dept_name,dept_head) values
('MGMT','Management','2'),
('SD','Software Development','3'),
('BS','Business Support','1'),
('OPS1','Operations CIM','4'),
('OPS2','Operations Cyber','5');



-- insert into tbl_employee_leaves(emp_id,lt_id) values 
-- (1,1), (9,1),(9,2),(9,3),(9,4),(9,5),(3,2),(4,4),(5,1),(8,3),(1,5),(3,4),(3,5),(4,1),(4,2),(4,5),(5,4),(6,4),(7,5);
-- insert into tbl_employee_leaves(emp_id,lt_id,days_entitled,days_taken) values 
-- (2,4,23,5),(3,1,12,4),(1,3,11,6),(8,4,5,2),(8,5,4,2),(7,2,5,2),(6,5,4,4);
-- 
-- insert into tbl_employee_leaves(emp_id,lt_id,days_entitled) values 
-- (1,2,10),(1,4,21),(2,1,14),(2,2,50),(2,3,10),(2,5,17),(3,3,13),(4,3,44),
-- (5,5,14),(5,2,50),(5,3,10),(6,1,14),(6,2,50),(6,3,10),(7,1,14),(7,4,50),
-- (7,3,10),(8,1,14),(8,2,50);

-- insert into tbl_leave_application(emp_id,lt_id,date_from,date_to,duration,reason,status,created_by, approved_by) values
-- ('5','1','2018-05-04','2018-05-08',(DATEDIFF(date_to, date_from)) +1,'Want to have fun','Pending',1,4),
-- ('7','2','2018-12-29','2019-01-03',(DATEDIFF(date_to, date_from)) +1,'Im sick','Pending',1,4);
-- 
-- insert into tbl_leave_application(emp_id,lt_id,date_from,date_to,duration,reason,status,approved_by,created_by) values 
-- ('2','3','2018-02-11','2018-02-18',(DATEDIFF(date_to, date_from)),'YOLO','Rejected',1,2),
-- ('4','2','2018-02-14','2018-02-22',(DATEDIFF(date_to, date_from)),'Bellyache','Approved',3,4),
-- ('6','5','2018-04-11','2018-04-15',(DATEDIFF(date_to, date_from)),'I need rest','Rejected',2,6),
-- ('8','3','2018-01-11','2018-01-12',(DATEDIFF(date_to, date_from)),'Baby','Rejected',5,8),
-- ('1','2','2018-04-21','2018-04-23',(DATEDIFF(date_to, date_from)),'I won the lottery','Approved',2,2),
-- ('5','1','2018-02-21','2018-02-22',(DATEDIFF(date_to, date_from)),'Living young wild and free','Approved',4,1),
-- ('2','1','2018-01-31','2018-02-04',(DATEDIFF(date_to, date_from)),'Need to relax','Rejected',5,5),
-- ('4','4','2018-01-21','2018-01-24',(DATEDIFF(date_to, date_from)),'Morality','Approved',6,2),
-- ('3','2','2018-03-22','2018-03-27',(DATEDIFF(date_to, date_from)),'Want to have some fun','Approved',8,3),
-- ('1','1','2018-02-01','2018-02-04',(DATEDIFF(date_to, date_from)),'You only live once','Approved',1,1);
-- 
-- insert into tbl_leave_application(emp_id,lt_id,date_from,date_to,duration,reason,status,approved_by,created_by) values 
-- ('2','3','2018-03-11','2018-03-18',(DATEDIFF(date_to, date_from)),'YOLO','Rejected',1,2),
-- ('4','2','2018-04-14','2018-04-22',(DATEDIFF(date_to, date_from)),'Bellyache','Approved',3,4),
-- ('6','5','2018-05-11','2018-05-15',(DATEDIFF(date_to, date_from)),'I need rest','Rejected',2,6),
-- ('8','3','2018-06-11','2018-06-12',date_to-date_from,'Baby','Rejected',5,8),
-- ('1','2','2018-07-21','2018-07-23',date_to-date_from,'I won the lottery','Approved',2,2),
-- ('5','1','2018-05-21','2018-05-22',date_to-date_from,'Living young wild and free','Approved',4,1),
-- ('2','1','2018-04-30','2018-05-04',date_to-date_from,'Need to relax','Rejected',5,5),
-- ('4','4','2018-03-21','2018-03-24',date_to-date_from,'Morality','Approved',6,2),
-- ('3','2','2018-05-22','2018-05-27',date_to-date_from,'Want to have some fun','Approved',8,3),
-- ('1','1','2018-06-01','2018-06-04',date_to-date_from,'You only live once','Approved',1,1);
-- 
-- insert into tbl_leave_application(emp_id,lt_id,date_from,date_to,duration,reason,status,created_by, attachment, approved_by) values
-- ('1','1','2018-06-02','2018-06-03',date_to-date_from,'Want to have fun','Pending',1, '192.168.75.45/LMS/uploads/travel.jpg',2),
-- ('7','4','2018-02-02','2018-02-05',date_to-date_from,'I am tired','Cancelled',7, '192.168.75.45/LMS/uploads/sick.jpg',3);
-- 
delimiter $$


drop procedure if exists get_leave_types$$ 
CREATE PROCEDURE get_leave_types()
BEGIN
	select * from tbl_leave_types where `status`='yes';
END$$

drop procedure if exists get_user_leave_types$$ 
CREATE PROCEDURE get_user_leave_types(in empid int(11))
BEGIN
	select lt_id from tbl_employee_leaves el, tbl_leave_types lt where emp_id = empid
    and el.lt_id = lt.id and lt.status="yes";
END$$

-- hehe

drop procedure if exists get_leave_type_name$$ 
CREATE PROCEDURE get_leave_type_name(in ltid int(11))
BEGIN
	select `name` from tbl_leave_types where id = ltid;
END$$

drop procedure if exists get_all_leave_type_names$$ 
CREATE PROCEDURE get_all_leave_type_names()
BEGIN
	select `name` from tbl_leave_types lt where lt.status="yes" ;
    call set_days_entitled_to_def();
END$$

drop procedure if exists set_leave_types$$
CREATE PROCEDURE set_leave_types(in `new_name` varchar(20), in new_default_days float(10,1), in to_carry_fwd float(10,1))
BEGIN
	insert into tbl_leave_types(`name`,default_days, `status`, allowed_carryfwd_days) values (new_name,new_default_days,'yes',carry_fwd);
    insert into tbl_employee_leaves(carry_fwd) values (to_carry_fwd);
	call copy_old_lt_id();
    -- call refresh();
END$$

drop procedure if exists set_department$$
CREATE PROCEDURE set_department(in `new_name` varchar(20), in new_dept_code varchar(55), new_dept_head int(11))
BEGIN
	insert into tbl_department (dept_name, dept_code, dept_head ) values (new_name,new_dept_code,new_dept_head);
    -- call refresh();
END$$

drop procedure if exists delete_leave_type$$
CREATE PROCEDURE delete_leave_type(in delete_name varchar(100))
BEGIN
	UPDATE tbl_leave_types
	SET `status`='no'
	WHERE `name`=delete_name;
	call copy_old_lt_id();
    -- call refresh();
    
    UPDATE  tbl_leave_application la, tbl_leave_types lt
	SET     la.status="Cancelled"
	WHERE   lt.status='no' and la.status="Pending";
END$$

drop procedure if exists delete_department$$
CREATE PROCEDURE delete_department(in department_code varchar(100))
BEGIN
	DELETE FROM tbl_department
	WHERE dept_code=department_code;
END$$

drop procedure if exists refresh$$
CREATE PROCEDURE refresh()
BEGIN
     SET @count = 0;
	 UPDATE `tbl_leave_types` SET `tbl_leave_types`.`id` = @count:= @count + 1;
END$$

drop procedure if exists get_employee_leave_balance$$ 
CREATE PROCEDURE get_employee_leave_balance(in empid int(11))
BEGIN
	select days_entitled-prev_carry_fwd prev_carry_fwd,days_entitled, days_taken, days_entitled - days_taken as days_left, carry_fwd 
    from tbl_employee_leaves el, tbl_leave_types lt
    where (emp_id  = empid) and el.lt_id = lt.id and lt.status="yes";
END$$

drop procedure if exists get_employee_leaves$$ 
CREATE PROCEDURE get_employee_leaves(in empid int(11))
BEGIN
	select lt_id, days_entitled, days_entitled - days_taken from tbl_employee_leaves where emp_id  = empid;
END$$

drop procedure if exists get_employee$$ 
CREATE PROCEDURE get_employee()
BEGIN
	select * from tbl_employee;
END$$

drop procedure if exists get_all_department_names$$ 
CREATE PROCEDURE get_all_department_names()
BEGIN
	select dept_name from tbl_department;
END$$

drop procedure if exists get_all_employee_names$$ 
CREATE PROCEDURE get_all_employee_names()
BEGIN
	select firstname, surname from tbl_employee;
END$$

drop procedure if exists get_all_employee_names_a$$ 
CREATE PROCEDURE get_all_employee_names_a()
BEGIN
	select firstname, surname,email from tbl_employee where `active`=1;
END$$

drop procedure if exists get_leave_application$$ 
CREATE PROCEDURE get_leave_application()
BEGIN
	select * from tbl_leave_application;
END$$

drop procedure if exists get_leave_history$$ 
CREATE PROCEDURE get_leave_history()
BEGIN
	select * from tbl_leave_history;
END$$

drop procedure if exists verify$$ 
CREATE PROCEDURE verify(in email_value varchar(255), in pass varchar(255))
BEGIN
	select firstname, surname, id 
	from tbl_employee
	where email=email_value AND `password`=pass;
END$$


drop procedure if exists verify_email$$ 
CREATE PROCEDURE verify_email(in email_value varchar(255))
BEGIN
	select firstname, surname, id 
	from tbl_employee
	where email=email_value;
END$$

create view vw_emp_leaves
as
select 
el.emp_id,el.lt_id,
e.firstname,e.surname,
el.days_entitled,el.days_taken
,lt.`name`,lt.default_days 
from tbl_employee_leaves el
        ,tbl_leave_types lt
        ,tbl_employee e
where el.lt_id = lt.id
and el.emp_id = e.id$$

drop trigger if exists set_new_lt $$
CREATE TRIGGER set_new_lt after INSERT ON tbl_leave_types
       FOR EACH row
       BEGIN
		   call add_rows_for_leave();
           call update_rows_for_leave();
           call set_days_entitled_to_def();
           -- call get_max_lt();
       END;$$
       
drop trigger if exists set_new_user $$
CREATE TRIGGER set_new_user after INSERT ON tbl_employee
       FOR EACH row
       BEGIN
		   call add_rows_for_new_user();
           call set_days_entitled_to_def();
           call days_carry_fwd();
       END;$$

-- drop trigger if exists set_new_lt $$
-- CREATE TRIGGER set_new_lt after INSERT ON tbl_leave_types
-- FOR EACH row
-- BEGIN
-- 	WHILE @count < 8 do
-- 	BEGIN
-- 		@count = count +1;
-- 		insert into tbl_employee_leaves(emp_id) values (@count);
-- 	END WHILE;$$
--     insert into tbl_employee_leaves(lt_id)
--            select id from tbl_leave_types
--            order by id desc limit 1;
--            call set_days_entitled_to_def();
-- END$$

-- CREATE TRIGGER set_new_lt BEFORE INSERT ON tbl_leave_types
--        FOR EACH ROW SET @sum = @sum + NEW.amount

update tbl_employee_leaves el, tbl_leave_types lt
set el.days_entitled = lt.default_days
where days_entitled is null AND el.lt_id = lt.id$$

update tbl_employee_leaves el, tbl_leave_types lt
set el.carry_fwd = lt.allowed_carryfwd_days
where el.carry_fwd = 0 and el.lt_id = lt.id$$

update tbl_employee e, tbl_department d
set e.head = d.dept_head
where e.d_id = d.id $$

update tbl_leave_application
set lt_id_copy = lt_id$$

drop procedure if exists copy_old_lt_id$$
Create procedure copy_old_lt_id()
begin
	update tbl_leave_application
	set lt_id_copy = lt_id;
    -- insert into tbl_leave_application(*) values (*);
end$$

drop procedure if exists set_days_entitled_to_def$$
Create procedure set_days_entitled_to_def()
begin
	update tbl_employee_leaves el, tbl_leave_types lt
	set el.days_entitled = lt.default_days
	where days_entitled is null AND el.lt_id = lt.id;
end$$

create view view_emp_leave_application
as
select la.attachment, la.half_day, firstname, surname, la.created_by, la.date_created, 
lt.name, reason, la.date_from, la.date_to, approved_by, la.date_approved, la.status, e.id,
la.date_cancelled, la.cancelled_by
from tbl_leave_application la, tbl_employee e, tbl_leave_types lt
where la.emp_id=e.id and la.lt_id_copy=lt.id $$

drop procedure if exists get_emp_leave_application$$ 
CREATE PROCEDURE get_emp_leave_application(in iden int(11))
BEGIN
	if iden = 0 then
		select * from view_emp_leave_application
		order by date_from desc;
    else
		select * from view_emp_leave_application
		where id = iden
		order by date_from desc;
	end if;
END$$

drop procedure if exists get_uemp_leave_application$$ 
CREATE PROCEDURE get_uemp_leave_application(in today datetime, in emp_iden int(11))
BEGIN
	select * from view_emp_leave_application
    where date_to > today and (status = "Approved" OR status="Pending") OR id = emp_iden OR approved_by=emp_iden
    order by date_from desc;
END$$

drop procedure if exists get_emp_name$$ 
CREATE PROCEDURE get_emp_name(in empid int(11))
BEGIN
	select firstname, surname from tbl_employee where id=empid;
END$$

drop procedure if exists get_emp_name$$ 
CREATE PROCEDURE get_emp_name(in empid int(11))
BEGIN
	select firstname, surname from tbl_employee where id=empid;
END$$

create view view_edit_user_leave_table
as
select e.id, concat(firstname , ' ' , surname) full_name, lt.name as leave_type_name, days_entitled-prev_carry_fwd days_entitled, days_entitled - days_taken days_left
from tbl_employee_leaves el, tbl_leave_types lt, tbl_employee e
where el.lt_id= lt.id and e.id = el.emp_id 
order by id, lt.id$$

drop procedure if exists get_edit_user_leave_table$$ 
CREATE PROCEDURE get_edit_user_leave_table()
BEGIN
	select * from view_edit_user_leave_table;
END$$

DROP PROCEDURE IF EXISTS `add_rows_for_leave`$$

CREATE PROCEDURE `add_rows_for_leave`()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
SELECT COUNT(distinct emp_id) FROM `tbl_employee_leaves` INTO n;
SET i=0;
WHILE i<n DO 
  SET i = i + 1;
  INSERT INTO `tbl_employee_leaves` (emp_id) values (i);
END WHILE;
END $$


DROP PROCEDURE IF EXISTS `update_rows_for_leave`$$

CREATE PROCEDURE `update_rows_for_leave`()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
DECLARE v INT DEFAULT 0;
SELECT COUNT(distinct emp_id) FROM `tbl_employee_leaves` INTO n;
SET i=0;
select id from tbl_leave_types
order by id desc limit 1 into v;
WHILE i<n DO 
  SET i = i + 1;
  Update `tbl_employee_leaves` set lt_id = v
  where lt_id IS NULL ANd days_entitled IS NULL;
END WHILE;
END $$

drop procedure if exists get_max_emp$$ 
CREATE PROCEDURE get_max_emp()
BEGIN
	SELECT COUNT(distinct emp_id) max_emp FROM `tbl_employee_leaves`;
END$$

drop procedure if exists get_max_lt$$ 
CREATE PROCEDURE get_max_lt()
BEGIN
	SELECT COUNT(distinct lt_id) max_lt FROM `tbl_employee_leaves`;
END$$

drop procedure if exists get_tbl_employee$$ 
CREATE PROCEDURE get_tbl_employee()
BEGIN
	select *, e.id from tbl_employee e, tbl_department d
    where e.d_id = d.id
    order by e.id asc;
END$$

drop procedure if exists get_pending_leaves$$ 
CREATE PROCEDURE get_pending_leaves()
BEGIN
	select count(distinct id) pending from tbl_leave_application
    where status = "Pending";
END$$

drop procedure if exists get_casual_leave$$ 
CREATE PROCEDURE get_casual_leave(in empid int(11))
BEGIN
	select days_entitled, days_entitled - days_taken days_left 
    from tbl_employee_leaves el, tbl_leave_types lt
    where el.lt_id = lt.id and lt.name = "Annual leave" and emp_id = empid;
END$$

drop procedure if exists get_sick_leave$$ 
CREATE PROCEDURE get_sick_leave(in empid int(11))
BEGIN
	select days_entitled, days_entitled - days_taken days_left 
    from tbl_employee_leaves el, tbl_leave_types lt
    where el.lt_id = lt.id and lt.name = 'Sick leave' and emp_id = empid;
END$$

drop procedure if exists get_study_leave$$ 
CREATE PROCEDURE get_study_leave(in empid int(11))
BEGIN
	select days_entitled, days_entitled - days_taken days_left 
    from tbl_employee_leaves el, tbl_leave_types lt
    where el.lt_id = lt.id and lt.name = "Study leave" and emp_id = empid;
END$$

drop procedure if exists get_emp_job$$ 
CREATE PROCEDURE get_emp_job(in empid int(11))
BEGIN
	select designation from tbl_employee where id=empid;
END$$

drop procedure if exists get_all_pending$$ 
CREATE PROCEDURE get_all_pending()
BEGIN
	select * from  tbl_employee e, tbl_leave_types lt, tbl_leave_application la
	where la.status = "pending" and la.lt_id=lt.id and la.emp_id = e.id;
end$$

drop procedure if exists get_approved$$ 
CREATE PROCEDURE get_approved()
BEGIN
	select * from  tbl_employee e, tbl_leave_types lt, tbl_leave_application la
	where la.status = "Approved" and la.lt_id=lt.id and la.emp_id = e.id 
    and date_to>now() - interval 5 day
    order by date_to asc;
end$$

drop procedure if exists set_leave_application_with_file$$ 
CREATE PROCEDURE set_leave_application_with_file(in empid int(11), in ltid int(11), in purpose text, in `file` varchar(255), in datefrom date, in dateto date, in createdby int(11), in dur float(10,1), in the_half_day varchar(100))
BEGIN
	insert into tbl_leave_application(emp_id,lt_id,date_from,date_to,duration,reason,status,created_by, attachment,half_day,date_created) 
    values (empid,ltid,datefrom,dateto,dur,purpose,'Pending',createdby, `file`, the_half_day,now());
    call copy_old_lt_id;
end$$

drop procedure if exists set_leave_application$$ 
CREATE PROCEDURE set_leave_application(in empid int(11), in ltid int(11), in purpose text, in datefrom date, in dateto date, in createdby int(11), in dur float(10,1), in the_half_day varchar(100))
BEGIN
	insert into tbl_leave_application(emp_id,lt_id,date_from,date_to,duration,reason,status,created_by, half_day,date_created) 
    values (empid,ltid,datefrom,dateto,dur,purpose,'Pending',createdby, the_half_day,now());
    call copy_old_lt_id;
end$$


drop procedure if exists change_status$$ 
CREATE PROCEDURE change_status(in iden int(11), in stat varchar(20), in approver int(11), in d_cancel varchar(255))
BEGIN
	declare emp_iden int default 0;
    declare dura float(10,1) default 0;
    declare lt_iden int default 0;
    select emp_id from tbl_leave_application where id = iden into emp_iden;
    select lt_id from tbl_leave_application where id = iden into lt_iden;
    select duration from tbl_leave_application where id = iden into dura;
	update tbl_leave_application set `status`=stat where id = iden;
	if stat = "Approved" then
		update tbl_employee_leaves set days_taken = dura + days_taken 
		where emp_id = emp_iden and lt_id = lt_iden;
	end if;
    update tbl_leave_application set approved_by = approver where id = iden;
    update tbl_leave_application la set la.date_approved = d_cancel, 
    la.updated_by= approver, la.date_updated = d_cancel
    where la.id = iden;
END$$

drop procedure if exists get_id$$ 
CREATE PROCEDURE get_id(in emp_fname varchar(50),in emp_sname varchar(50),in emp_email varchar(50))
BEGIN
	SELECT id from tbl_employee where firstname=emp_fname
    and surname=emp_sname and email = emp_email;
END$$

drop procedure if exists get_att_id$$ 
CREATE PROCEDURE get_att_id(in emp_iden int(11),in link varchar(250),in creation_date timestamp)
BEGIN
	SELECT id from tbl_attachment where emp_id = emp_iden
    and attachment=link and date_created= creation_date;
END$$

drop procedure if exists get_did$$ 
CREATE PROCEDURE get_did(in dep_name varchar(50))
BEGin
	SELECT id from tbl_department where dept_name=dep_name;
END$$

-- drop procedure if exists set_new_employee$$ 
-- CREATE PROCEDURE set_new_employee(in fname varchar(255), in lname varchar(255), 
-- in dept_id int(11), in job_name varchar(255), in email varchar(255), in phone varchar(30), in adminis tinyint(1), in pass varchar(33))
-- BEGIN
-- 	insert into tbl_employee(d_id,designation,surname,firstname,
--     email,`password`,phone,active, admin) 
--     values (dept_id,job_name,lname,fname,email,pass,phone,1, adminis);
--     
--     update tbl_employee e, tbl_department d
-- 	set e.head = d.dept_head
-- 	where e.d_id = d.id and e.head is null;
-- end$$

drop procedure if exists set_new_employee$$ 
CREATE PROCEDURE set_new_employee(in fname varchar(255), in lname varchar(255), 
in dept_id int(11), in job_name varchar(255), in email varchar(255), in phone varchar(30),
 in adminis tinyint(1), in pass varchar(33), in dobirth timestamp, in doentry timestamp,
 in nicard varchar(255), in pass_port varchar(255), in nkin varchar(100),
 in pnkin varchar(100), in add_ress varchar(255))
BEGIN
	insert into tbl_employee(d_id,designation,surname,firstname,
    email,`password`,phone,active, admin, dob, date_of_entry, nic, passport,
    kin_name, kin_phone, address,date_created) 
    values (dept_id,job_name,lname,fname,email,pass,phone,1, adminis,
    dobirth, doentry, nicard, pass_port, nkin, pnkin, add_ress,now());
    
    update tbl_employee e, tbl_department d
	set e.head = d.dept_head
	where e.d_id = d.id and e.head is null;
end$$

drop procedure if exists set_attachment$$ 
CREATE PROCEDURE set_attachment(in link varchar(250), in emp_iden int(11), in updator int(11))
BEGin
	insert into tbl_attachment (attachment, emp_id, updated_by, created_by,active) values (link, emp_iden, updator, updator,1);
END$$

DROP PROCEDURE IF EXISTS `add_rows_for_new_user`$$
CREATE PROCEDURE `add_rows_for_new_user`()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
DECLARE v INT DEFAULT 0;
SELECT COUNT(distinct id) FROM `tbl_leave_types` INTO v;
SELECT COUNT(distinct id) FROM `tbl_employee` INTO n;
SET i=0;
WHILE i<v DO 
  SET i = i + 1;
  INSERT INTO `tbl_employee_leaves` (emp_id, lt_id) values (n,i);
END WHILE;
END $$

drop procedure if exists no_pending$$
create procedure no_pending()
begin
	select count(distinct id) count from tbl_leave_application where status='Pending';
end$$

drop procedure if exists update_user_leaves$$
create procedure update_user_leaves(in colname varchar(255), in value varchar(255), in iden int(11))
begin
	Update tbl_employee_leaves set days_entitled=value where emp_id=iden and lt_id=colname;
end$$

drop procedure if exists update_user_details$$
create procedure update_user_details(in colname varchar(255), in value varchar(255), in iden int(11))
begin
	if colname = "phone" then
		Update tbl_employee set phone=value, date_updated=now() where id=iden;
    elseif colname = "firstname" then
		Update tbl_employee set firstname=value, date_updated=now() where id=iden;
    elseif colname = "surname" then
		Update tbl_employee set surname=value, date_updated=now() where id=iden;
    elseif colname = "designation" then
		Update tbl_employee set designation=value, date_updated=now() where id=iden;
	elseif colname = "head" then
		Update tbl_employee set head=value, date_updated=now() where id=iden;
	elseif colname = "dept" then
		Update tbl_employee set d_id=value, date_updated=now() where id=iden;
    elseif colname = "email" then
		Update tbl_employee set email=value, date_updated=now() where id=iden;
    elseif colname = "active" then
		Update tbl_employee set active=value, date_updated=now() where id=iden;
    elseif colname = "admin" then
		Update tbl_employee set admin=value, date_updated=now() where id=iden;
	elseif colname = "cascade_approval" then
		Update tbl_employee set cascade_approval=value, date_updated=now() where id=iden;
	elseif colname = "passport" then
		Update tbl_employee set passport=value, date_updated=now() where id=iden;
	elseif colname = "NIC" then
		Update tbl_employee set NIC=value, date_updated=now() where id=iden;
	elseif colname = "DOB" then
		Update tbl_employee set DOB=value, date_updated=now() where id=iden;
	elseif colname = "address" then
		Update tbl_employee set address=value, date_updated=now() where id=iden;
	elseif colname = "date_of_entry" then
		Update tbl_employee set date_of_entry=value, date_updated=now() where id=iden;
	elseif colname = "date_of_exit" then
		Update tbl_employee set date_of_exit=value, date_updated=now() where id=iden;
	elseif colname = "kin_name" then
		Update tbl_employee set kin_name=value, date_updated=now() where id=iden;
	elseif colname = "kin_phone" then
		Update tbl_employee set kin_phone=value, date_updated=now() where id=iden;
    end if;
end$$

drop procedure if exists get_tbl_department$$
create procedure get_tbl_department()
begin
	select * from tbl_department;
end$$

drop procedure if exists get_tbl_emp_no_dep$$
create procedure get_tbl_emp_no_dep()
begin
	select * from tbl_employee where
    d_id is null;
end$$

drop procedure if exists get_emp_head_email$$
create procedure get_emp_head_email(in emp_iden int)
begin
	declare n int default 0;
	select head from tbl_employee where id = emp_iden into n;
    select email from tbl_employee where id = n;
end$$

drop procedure if exists get_emp_email$$
create procedure get_emp_email(in emp_iden int)
begin
    select email from tbl_employee where id = emp_iden;
end$$

drop procedure if exists get_emp_head$$
create procedure get_emp_head(in emp_iden int)
begin
	declare n int default 0;
	select head from tbl_employee where id = emp_iden;
end$$

drop procedure if exists change_pass$$
create procedure change_pass(in em varchar(100), in new_pass varchar(100))
begin
	update tbl_employee set password = new_pass where email = em;
end$$

drop procedure if exists assign_approver$$
create procedure assign_approver()
begin
	update tbl_leave_application la, tbl_employee e set la.approved_by = e.head where la.approved_by = 0 and la.emp_id = e.id;
end$$

drop procedure if exists cancel_app$$
create procedure cancel_app(in emp_iden int(11), in iden int(11), in d_cancel timestamp)
begin
	update tbl_leave_application la set
    la.status = "Cancelled", la.cancelled_by = emp_iden,
    la.date_cancelled = d_cancel, la.updated_by= emp_iden, la.date_updated = d_cancel where 
    la.id = iden;
end$$

drop procedure if exists cancel_approved$$
create procedure cancel_approved(in emp_iden int(11), in iden int(11), in d_cancel timestamp)
begin
    declare emp_ide int default 0;
    declare dura float(10,1) default 0;
    declare lt_iden int default 0;
    select emp_id from tbl_leave_application where id = iden into emp_ide;
    select lt_id from tbl_leave_application where id = iden into lt_iden;
    select duration from tbl_leave_application where id = iden into dura;
    
    update tbl_leave_application la set
    la.status = "Cancelled", la.cancelled_by = emp_iden,
    la.date_cancelled = d_cancel, la.date_updated = d_cancel,
    updated_by = emp_iden where 
    la.id = iden;
    
    -- if stat = "Approved" then
	update tbl_employee_leaves set days_taken = days_taken-dura
	where emp_id = emp_ide and lt_id = lt_iden;
	-- end if;
end$$

drop procedure if exists get_deleted_lt_cancel_empid$$
create procedure get_deleted_lt_cancel_empid(in lt_name varchar(200))
begin
	select emp_id from tbl_leave_application la,tbl_leave_types lt
    where la.lt_id = lt.id and la.status="Pending" and lt.name = lt_name;
end$$

drop procedure if exists get_no_users$$
create procedure get_no_users()
begin
	select count(id) x from tbl_employee;
end$$

drop procedure if exists is_admin$$
create procedure is_admin(in emp_iden int(11))
begin
	select admin from tbl_employee where id = emp_iden;
end$$

drop procedure if exists no_on_leave$$
create procedure no_on_leave(in today_date date)
begin
	select count(emp_id) num from tbl_leave_application
    where today_date between date_from and date_to and status="Approved";
end$$

drop procedure if exists no_pending_u$$
create procedure no_pending_u(in emp_iden int(11))
begin
	select count(la.id) num from tbl_leave_application la, tbl_employee e 
	where e.id = la.emp_id and (e.head = emp_iden or la.emp_id = emp_iden)
	and la.status = "Pending";
end$$

drop procedure if exists get_duration$$
create procedure get_duration(in data_from date, in data_to date)
begin
	if (WEEKDAY(data_from) = 5 AND WEEKDAY(data_to) = 5) 
    OR (WEEKDAY(data_from) = 6 AND WEEKDAY(data_to) = 6) then
		select (5 * (DATEDIFF(data_to, data_from) DIV 7) 
		+ MID('0123444401233334012222340111123400001234000123440',
		7 * WEEKDAY(data_from) + WEEKDAY(data_to) + 1, 1))-
        (SELECT COUNT(*) FROM tbl_holidays WHERE holiday>=data_from and holiday<=data_to) dur;
	else 
		select (5 * (DATEDIFF(data_to, data_from) DIV 7) 
		+ MID('0123444401233334012222340111123400001234000123440',
		7 * WEEKDAY(data_from) + WEEKDAY(data_to) + 1, 1))+1
        -(SELECT COUNT(*) FROM tbl_holidays WHERE holiday>=data_from and holiday<=data_to) dur;
	end if;
end$$

drop procedure if exists get_tbl_holidays$$
create procedure get_tbl_holidays()
begin
	select * from tbl_holidays
    order by holiday asc;
end$$

drop procedure if exists set_holiday$$
create procedure set_holiday(in holiname varchar(255), in holidate date)
begin
	insert into tbl_holidays(holiday, holiday_name) values (holidate, holiname);
end$$

drop procedure if exists delete_holiday$$
CREATE PROCEDURE delete_holiday(in holiden date)
BEGIN
	DELETE FROM tbl_holidays
	WHERE holiday= holiden;
END$$

drop procedure if exists delete_att$$
CREATE PROCEDURE delete_att(in iden int(11))
BEGIN
	UPDATE tbl_attachment set active=0 where id= iden;
END$$

drop procedure if exists update_holiday$$
create procedure update_holiday(in colname varchar(255), in value varchar(255), in iden int(11))
begin
	if colname = "holiday" then
		Update tbl_holidays set holiday=value where id=iden;
    elseif colname = "holiday_name" then
		Update tbl_holidays set holiday_name=value where id=iden;
    end if;
end$$

drop procedure if exists update_departments$$
create procedure update_departments(in colname varchar(255), in value varchar(255), in iden int(11))
begin
	declare old_head int(11) default 0;
	if colname = "dept_code" then
		Update tbl_department set dept_code=value where id=iden;
    elseif colname = "dept_head" then
		select dept_head from tbl_department where id = iden into old_head;
		Update tbl_department set dept_head=value where id=iden;
        call update_dept_head(old_head, iden);
	elseif colname = "dept_name" then
		Update tbl_department set dept_name=value where id=iden;
    end if;
end$$

drop procedure if exists update_leave_types$$
create procedure update_leave_types(in colname varchar(255), in value varchar(255), in iden int(11))
begin
	declare old_cf int(11) default 0;
    declare old_dd int(11) default 0;
	if colname = "name" then
		Update tbl_leave_types set `name`=value where id=iden;
    elseif colname = "default_days" then
		select default_days from tbl_leave_types where id = iden into old_dd;
		Update tbl_leave_types set default_days=value where id=iden;
        call update_default_days(old_dd, iden);
	elseif colname = "allowed_carryfwd_days" then
		select allowed_carryfwd_days from tbl_leave_types where id = iden into old_cf;
		Update tbl_leave_types set allowed_carryfwd_days=value where id=iden;
		call update_carry_fwd(old_cf, iden);
    end if;
end$$

drop procedure if exists get_holiden$$
create procedure get_holiden(in the_name varchar(255))
begin
	select id from tbl_holidays where holiday_name= the_name;
end$$

drop procedure if exists get_no_la$$
create procedure get_no_la()
begin
	select count(id) max from tbl_leave_application;
end$$

drop procedure if exists get_lt_left$$
create procedure get_lt_left(in emp_iden int(11), in lt_iden int(11))
begin
	if lt_iden = 2 then
		select -999 days_left;
    else
		select days_entitled-days_taken days_left from tbl_employee_leaves where emp_id = emp_iden and lt_id = lt_iden; 
	end if;
end$$

drop procedure if exists new_year$$
create procedure new_year()
begin
	declare i, x int default 0;
	declare n_emp int default 0;
    declare n_lt int default 0;
    declare old_days_ent int default 0;
	select count(id) from tbl_employee into n_emp;
    select count(id) from tbl_leave_types into n_lt;
    WHILE i< n_emp DO 
	  SET i = i + 1;
	  WHILE x< n_lt DO
		SET x = x + 1;
        IF ((select days_entitled-days_taken from tbl_employee_leaves where emp_id = i and lt_id = x) 
        >= (select allowed_carryfwd_days from tbl_leave_types where id = x)) then
        
			UPDATE tbl_employee_leaves,
            (select allowed_carryfwd_days max_ad from tbl_leave_types where id = x)acf,
            (select prev_carry_fwd pre_cf from tbl_employee_leaves where emp_id = i and lt_id = x) pcf
            set days_entitled = (days_entitled + (max_ad) - (pre_cf))
            where emp_id = i and lt_id = x;
            
            UPDATE tbl_employee_leaves, 
            (select allowed_carryfwd_days maxcf from tbl_leave_types where id = x) acf
            set prev_carry_fwd = maxcf
			where emp_id = i and lt_id = x;
            
		else
			select days_entitled from tbl_employee_leaves where emp_id = i and lt_id = x into old_days_ent;
			UPDATE tbl_employee_leaves as el,
			(select days_entitled-days_taken dleft from tbl_employee_leaves where emp_id = i and lt_id =x) dl,
			(select prev_carry_fwd precf from tbl_employee_leaves where emp_id = i and lt_id = x) pcf
			set days_entitled = (days_entitled + dleft - precf)
            where emp_id = i and lt_id = x;
            
            UPDATE tbl_employee_leaves,
            (select days_taken dtaken from tbl_employee_leaves where emp_id = i and lt_id = x) dl
            set prev_carry_fwd = old_days_ent- dtaken
            where emp_id = i and lt_id = x;
        end if;
        
        UPDATE tbl_employee_leaves set days_taken = 0 where emp_id = i and lt_id = x;
      END WHILE;
      SET x = 0;
	END WHILE;
end$$

drop procedure if exists get_precf$$
create procedure get_precf(in iden int(11))
begin
	select prev_carry_fwd from tbl_employee_leaves
    where id = iden;
end$$

drop procedure if exists get_name_from_email$$
create procedure get_name_from_email(in xemail varchar(200))
begin
	select concat(firstname," ", surname) name, id from tbl_employee where email = xemail;
end$$

drop procedure if exists get_id_from_dcode$$
create procedure get_id_from_dcode(in dcode varchar(30))
begin
	select id from tbl_department where dept_code = dcode;
end$$

drop procedure if exists update_dept_head$$
create procedure update_dept_head(in old_head int(11), in dept_id int(11))
begin
	declare i int default 0;
    declare x int default 0;
    select count(id) from tbl_employee into i;
    while x <= i do
		if (select head from tbl_employee where id = x)=old_head then
			update tbl_employee, (select dept_head from tbl_department where id = dept_id) d 
            set head= dept_head where id = x;
        end if;
        set x = x +1;
    end while;
end$$

drop procedure if exists update_carry_fwd$$
create procedure update_carry_fwd(in old_cf int(11), in iden int(11))
begin
	declare i int default 0;
    declare x int default 0;
    select count(id) from tbl_employee into i;
    while x <= i do 
		if (select carry_fwd from tbl_employee_leaves where id = x and lt_id=iden)=old_cf then
			update tbl_employee_leaves, (select allowed_carryfwd_days from tbl_leave_types where id = iden) lt
            set carry_fwd= allowed_carryfwd_days where id = x and lt_id=iden;
        end if;
        set x = x +1;
    end while;
end$$

drop procedure if exists update_default_days$$
create procedure update_default_days(in old_dd int(11), in iden int(11))
begin
	declare i int default 0;
    declare x int default 0;
    select count(id) from tbl_employee into i;
    while x <= i do 
		if (select days_entitled-prev_carry_fwd from tbl_employee_leaves where emp_id = x and lt_id=iden)=old_dd then
			update tbl_employee_leaves, (select default_days from tbl_leave_types where id = iden) lt,
            (select prev_carry_fwd from tbl_employee_leaves where emp_id = x and lt_id=iden) pcf
            set days_entitled= default_days + pcf.prev_carry_fwd where emp_id = x and lt_id=iden;
        end if;
        set x = x +1;
    end while;
end$$

drop procedure if exists get_ltid_from_name$$
create procedure get_ltid_from_name(in ltname varchar(100))
begin
	select id from tbl_leave_types where name = ltname;
end$$

drop procedure if exists days_carry_fwd$$ 
CREATE PROCEDURE days_carry_fwd()
BEGIN
	declare num int default 0;
    set num = 0;
    select count(id) from tbl_employee into num;
    
	update tbl_employee_leaves el, tbl_leave_types lt
	set el.carry_fwd = lt.allowed_carryfwd_days
	where el.emp_id = num and lt.id = el.lt_id;
END$$

drop procedure if exists get_cascade_approval_from_empid$$
create procedure get_cascade_approval_from_empid(in emp_iden varchar(100))
begin
	select cascade_approval from tbl_employee where id = emp_iden;
end$$

drop procedure if exists get_half_day$$
create procedure get_half_day(in iden int(11))
begin
	select half_day from tbl_leave_application where id = iden;
end$$

drop procedure if exists get_admins$$
create procedure get_admins()
begin
	select * from tbl_employee where admin=1;
end$$

drop procedure if exists get_emp_attachments$$
create procedure get_emp_attachments(in emp_iden int(11))
begin
	select * from tbl_attachment where emp_id= emp_iden and active=1;
end$$

delimiter ;

call add_rows_for_leave();
call update_rows_for_leave();
call set_days_entitled_to_def();


insert into tbl_employee(d_id,head,designation, surname,firstname,email,password,phone,active,admin) values
('3',2,'Assistant Manager','Najurally','Suraiya','ninisama890@gmail.com','(0>?I','555444222','1','1');

insert into tbl_employee(d_id, head, designation, surname,firstname,email,password,phone,active,cascade_approval) values
('1',2,'Director','Padayatchy','Viv','ninisama890@gmail.com','=5G','555444222','1','0'),
('2',2,'Software Development Manager','Putten','Domela','ninisama890@gmail.com','558;G','555444222','1','1'),
('3',2,'Operations Manager','Reddy','Karunaker','ninisama890@gmail.com',');3','555595222','1','1'),
('4',2,'IT Support Manager','Rampersand','Pooja','ninisama890@gmail.com',':@6L@','541444222','1','0');


-- insert into tbl_employee(d_id, designation, surname,firstname,email,password,phone,active) values
-- ('1','Software Manager','Clark','Jane','kenkenysy@gmail.com','password','555444222','1'),
-- ('2','Operation Manager','Yong','Nigel','nigelyong@myt.mu','password','555444222','1'),
-- ('3','IT Insfractructure Manager','Kent','Bob','bob@email.com','password','555595222','1'),
-- ('4','IT Support Manager','Mai','Steve','steve@email.com','password','541444222','1'),
-- ('1','Software Developer','Lee','John','ninisama890@gmail.com','password','555324222','1'),
-- ('2','Business Officer','Sen','Ben','nigelyong@hackers.mu','password','555444472','1'),
-- ('3','System Admin','Noor','Chris','chris@email.com','password','578444222','0'),
-- ('4','Human Resource officer','Rooney','Donald','donald@email.com','password','556344222','1');
-- 




