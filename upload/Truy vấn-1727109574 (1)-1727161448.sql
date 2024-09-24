SELECT id, employee_name, salary FROM employee WHERE salary > 30000
SELECT id, employee_name, start_date FROM employee WHERE start_date < "2021-1-1"

update employee
SET salary = salary * 1.15 
WHERE department_id = 1;

SELECT employee.id, employee_name, salary, department_name, company.company_name 
FROM employee, department, company  
WHERE employee.department_id = department.id 
AND company.id = company_id;

SELECT employee.id, employee_name, salary, department_name, company_name, address
FROM employee
LEFT JOIN department ON employee.department_id = department.id 
LEFT JOIN company ON company.id = company_id

SELECT cate_name FROM product_cate WHERE id=26


SELECT product.id,  product_name, price, discount_price, img, product_cate.cate_name FROM product
LEFT JOIN product_cate ON  product_cate.id = cate_id
ORDER BY id DESC

SELECT COUNT(*) AS CNT FROM product WHERE cate_id = 26;
