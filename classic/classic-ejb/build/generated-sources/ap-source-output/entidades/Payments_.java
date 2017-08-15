package entidades;

import entidades.PaymentsPK;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2017-08-14T18:43:01")
@StaticMetamodel(Payments.class)
public class Payments_ { 

    public static volatile SingularAttribute<Payments, Double> amount;
    public static volatile SingularAttribute<Payments, PaymentsPK> paymentsPK;
    public static volatile SingularAttribute<Payments, Date> paymentDate;

}