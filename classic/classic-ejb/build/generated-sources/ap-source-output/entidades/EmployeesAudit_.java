package entidades;

import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2017-08-14T18:43:01")
@StaticMetamodel(EmployeesAudit.class)
public class EmployeesAudit_ { 

    public static volatile SingularAttribute<EmployeesAudit, Integer> employeenumber;
    public static volatile SingularAttribute<EmployeesAudit, String> action;
    public static volatile SingularAttribute<EmployeesAudit, Integer> id;
    public static volatile SingularAttribute<EmployeesAudit, Date> changedon;
    public static volatile SingularAttribute<EmployeesAudit, String> lastname;

}