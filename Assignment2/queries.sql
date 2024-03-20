use employee;

-- Q1 WAQ to list all employee first name with salary greater than 50k.

select employee_first_name, employee_salary from employee_details_table as d
inner join employee_salary_table as s on d.employee_id=s.employee_id
where employee_salary > 50000;

-- Q2 WAQ to list all employee last name with graduation percentile greater than 70%.
select employee_last_name , graduation_percentile from employee_details_table
where graduation_percentile > 70;

-- Q3 WAQ to list all employee code name with graduation percentile less than 70%.

select employee_code, graduation_percentile from employee_details_table as d
inner join employee_salary_table as s on d.employee_id=s.employee_id
where graduation_percentile < 70;

-- Q4 WAQ to list all employee’s full name that are not of domain Java.

select concat(t3.employee_first_name , ' ' , t3.employee_last_name) as
full_name, t1.employee_domain from employee_code_table as t1 join
employee_salary_table as t2 on t1.employee_code = t2.employee_code join
employee_details_table as t3 on t2.employee_id = t3.employee_id
where t1.employee_domain != 'Java';

--Q5 WAQ to list all employee_domain with sum of it's salary.

select employee_domain, sum(employee_salary) from employee_code_table t1 join
employee_salary_table t2 on t1.employee_code=t2.employee_code
group by employee_domain;

-- Q6 Write the above query again but dont include salaries which is less than 30k.

select employee_domain, sum(employee_salary) from employee_code_table t1 join
employee_salary_table t2 on t1.employee_code=t2.employee_code
where employee_salary > 30000 group by employee_domain;

-- Q6 WAQ to list all employee id which has not been assigned employee code.

select employee_id from employee_salary_table where employee_code is null;
