-- Create database and use it.
create database if not exists employee;
use employee;

-- Create Tables.
create table if not exists employee_code_table (
  employee_code varchar(50) primary key,
  employee_code_name varchar(50) not null,
  employee_domain varchar(50) not null
);

create table if not exists employee_salary_table (
  employee_id varchar(50) primary key,
  employee_salary int not null,
  employee_code varchar(50),
  foreign key (employee_code)
  references employee_code_table(employee_code) on delete cascade
);

create table if not exists employee_details_table (
  employee_id varchar(50),
  employee_first_name varchar(50) not null,
  employee_last_name varchar(50) not null,
  graduation_percentile int not null,
  foreign key (employee_id)
  references employee_salary_table(employee_id) on delete cascade
);
