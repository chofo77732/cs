package entidades;

import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2017-08-14T18:43:01")
@StaticMetamodel(Orders.class)
public class Orders_ { 

    public static volatile SingularAttribute<Orders, Integer> orderNumber;
    public static volatile SingularAttribute<Orders, String> comments;
    public static volatile SingularAttribute<Orders, Date> requiredDate;
    public static volatile SingularAttribute<Orders, Integer> customerNumber;
    public static volatile SingularAttribute<Orders, Date> orderDate;
    public static volatile SingularAttribute<Orders, Date> shippedDate;
    public static volatile SingularAttribute<Orders, String> status;

}