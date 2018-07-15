using System.Collections.Generic;
using UnityEngine;

[CreateAssetMenu]
public class ItemDatos : ScriptableObject
{
    public List<ItemModelo> datosItems = new List<ItemModelo>();

    private static ItemDatos _instancia;
    public Dictionary<ItemID, ItemModelo> _datosItemsDiccionario;

    public static ItemDatos Instancia
    {
        get
        {
            if (_instancia == null)
            {
                _instancia = (ItemDatos)Resources.Load("Items");
            }
            
            return _instancia;
        }
    }

    public Dictionary<ItemID, ItemModelo> DatosItemsDiccionario
    {
        get
        {
            if (_datosItemsDiccionario == null)
            {
                _datosItemsDiccionario = new Dictionary<ItemID, ItemModelo>();
                AsignarDiccionario();
            }           

            return _datosItemsDiccionario;
        }
    }

    private void AsignarDiccionario()
    {
        for (int i = 0; i < datosItems.Count; i++)
        {
            _datosItemsDiccionario.Add(datosItems[i].ID, datosItems[i]);
        }
    }

}