create table update_profile_log(  
	id INT auto_increment primary key,     
	user_id INT NOT NULL,     
	updated_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table update_post_log(  
	id INT auto_increment primary key,     
	post_id INT NOT NULL,     
	updated_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table delete_post_log(  
	id INT auto_increment primary key,     
	post_id INT NOT NULL,
	title varchar(191) NOT NULL,
	body text NOT NULL,
	deleted_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table delete_permission_log(  
	id INT auto_increment primary key,     
	name varchar(50) NOT NULL,
	guard varchar(50) NOT NULL,
	deleted_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table update_user_log(  
	id INT auto_increment primary key,     
	user_id INT NOT NULL,     
	updated_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table delete_user_log(
	id INT auto_increment primary key,     
	user_id INT NOT NULL,     
	deleted_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table update_course_log(  
	id INT auto_increment primary key,     
	course_id INT NOT NULL,
	name VARCHAR(191) NOT NULL,
	duration INT NOT NULL,
	level INT NOT NULL,
	location VARCHAR(191) NOT NULL,
	updated_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table delete_course_log(  
	id INT auto_increment primary key,     
	course_id INT NOT NULL,
	name VARCHAR(191) NOT NULL,
	duration INT NOT NULL,
	level INT NOT NULL,
	location VARCHAR(191) NOT NULL,
	deleted_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table update_event_log(
	id INT auto_increment primary key,
	event_id INT NOT NULL,
	updated_at datetime default NULL,     
	action varchar(50) default NULL 
);

create table delete_event_log(
	id INT auto_increment primary key,
	event_id INT NOT NULL,
	deleted_at datetime default NULL,     
	action varchar(50) default NULL 
);

#trigger for user_profiles
delimiter $$

create trigger before_profile_update
	before update on user_profiles
    for each row
begin
	insert into update_profile_log
    set action = 'update',
    user_id = OLD.id,
    updated_at = now();
end$$

delimiter ;

#trigger for post
delimiter $$

create trigger before_post_update
	before update on posts
    for each row
begin
	insert into update_post_log
    set action = 'update',
    post_id = OLD.id,
    updated_at = now();
end$$

create trigger before_post_delete
	before delete on posts
    for each row
begin
	insert into delete_post_log
    set action = 'delete',
    post_id = OLD.id,
	title = OLD.title,
	body = OLD.body,
    deleted_at = now();
end$$

delimiter ;

#trigger for permission
delimiter $$

create trigger before_permission_delete
	before delete on permissions
    for each row
begin
	insert into delete_permission_log
    set action = 'delete',
    name = OLD.name,
    guard = OLD.guard_name,
    deleted_at = now();
end$$

delimiter ;

#trigger for users
delimiter $$

create trigger before_user_update
	before update on users
    for each row
begin
	insert into update_user_log
    set action = 'update',
    user_id = OLD.id,
    updated_at = now();
end$$

create trigger before_user_delete
	before delete on users
    for each row
begin
	insert into delete_user_log
    set action = 'delete',
    user_id = OLD.id,
    deleted_at = now();
end$$

delimiter ;

#trigger for courses
delimiter $$

create trigger before_course_update
	before update on courses
    for each row
begin
	insert into update_course_log
    set action = 'update',
    course_id = OLD.id,
	name = OLD.name,
	duration = OLD.duration,
	level = OLD.level,
	location = OLD.location,
    updated_at = now();
end$$

create trigger before_course_delete
	before delete on courses
    for each row
begin
	insert into delete_course_log
    set action = 'delete',
    course_id = OLD.id,
	name = OLD.name,
	duration = OLD.duration,
	level = OLD.level,
	location = OLD.location,
    deleted_at = now();
end$$

delimiter ;

#trigger for event
delimiter $$

create trigger before_event_update
	before update on events
	for each row
begin
	insert into update_event_log
	set action = 'update',
	event_id = OLD.id,
	updated_at = now();
end$$

create trigger before_event_delete
	before delete on events
	for each row
begin
	insert into delete_event_log
	set action = 'delete',
	event_id = OLD.id,
	updated_at = now();
end$$

delimiter ;