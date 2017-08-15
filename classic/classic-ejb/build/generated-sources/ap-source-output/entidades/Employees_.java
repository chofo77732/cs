package entidades;

import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2017-08-14T18:43:01")
@StaticMetamodel(Employees.class)
public class Employees_ { 

    public static volatile SingularAttribute<Employees, String> lastName;
    public static volatile SingularAttribute<Employees, String> firstName;
    public static volatile SingularAttribute<Employees, String> extension;
    public static volatile SingularAttribute<Employees, String> jobTitle;
    public static volatile SingularAttribute<Employees, String> officeCode;
    public static volatile SingularAttribute<Employees, Integer> reportsTo;
    public static volatile SingularAttribute<Employees, String> email;
    public static volatile SingularAttribute<Employees, Integer> employeeNumber;

}