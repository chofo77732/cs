/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

import entidades.EmployeesAudit;
import java.util.List;
import javax.ejb.Local;

/**
 *
 * @author MiguelAngel
 */
@Local
public interface EmployeesAuditFacadeLocal {

    void create(EmployeesAudit employeesAudit);

    void edit(EmployeesAudit employeesAudit);

    void remove(EmployeesAudit employeesAudit);

    EmployeesAudit find(Object id);

    List<EmployeesAudit> findAll();

    List<EmployeesAudit> findRange(int[] range);

    int count();
    
}
