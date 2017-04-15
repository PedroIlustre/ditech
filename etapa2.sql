SELECT DATEDIFF(de.to_date,de.from_date) as dias_trabalhados,d.dept_name,CONCAT( e.first_name ,' ', e.last_name ) AS nome FROM employees e 
LEFT JOIN dept_emp de ON de.emp_no = e.emp_no
LEFT JOIN departments d ON d.dept_no = de.dept_no
order by DATEDIFF(de.to_date,de.from_date) desc
limit 10
