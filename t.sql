use test;

----------Doctors----------
drop table if exists doctors;
create table doctors(
    id int(10) primary key auto_increment,
    name varchar(50) not null,
    email varchar(50) not null,
    phone varchar(50) not null,
    role varchar(50) not null,
    specialists varchar(50) not null,
    gender varchar(50) not null,
    hospital varchar(50) not null,
    created_at timestamp

);

drop table if exists patients;
create table patients(
id int(10) primary key auto_increment,
name varchar(50) not null,
age int(6) not null,
gender varchar(50) not null,
problem varchar(100) not null

);

drop table if exists patient_appoints;
create table patient_appoints(
    id int(10) primary key auto_increment,
    name varchar(50) not null,
    age int(6) not null,
    doctor_id int(10) not null,
    shift_time varchar(50) not null,
    appoint_date date
);

drop table if exists pathologies;
create table pathologies(
    id int(10) primary key auto_increment,
    name varchar(50) not null,
    price varchar(50) not null
);

-- this is for HR
drop table if exists employees;
create table employees(
 id int(10) primary key auto_increment,
 emp_name varchar(50) not null,
 department_id int(50) not null,
 position_id int(50) not null,
 pre_address varchar(200) not null,
 per_address varchar(200) not null,
 nid_no varchar(17) unique not null,
 mobile varchar (15) not null unique,
gender varchar (20) not null,
joining_date date,
created_at timestamp

);

drop table if exists departments;
create table departments(
    id int(10) primary key auto_increment,
    name varchar(50) not null
);

drop table if exists positions;
create table positions(
    id int(10) primary key auto_increment,
    name varchar(50) not null
);

drop table if exists attendences;
create table attendences(
    id int(10) primary key auto_increment,
    employee_id int(10) not null,
    department_id int(50) not null,
    in_time time not null,
    out_time time not null,
    
    date date

);