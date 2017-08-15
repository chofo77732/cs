/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo;

import entidades.Offices;
import java.util.List;
import javax.ejb.Local;

/**
 *
 * @author MiguelAngel
 */
@Local
public interface OfficesFacadeLocal {

    void create(Offices offices);

    void edit(Offices offices);

    void remove(Offices offices);

    Offices find(Object id);

    List<Offices> findAll();

    List<Offices> findRange(int[] range);

    int count();
    
}
