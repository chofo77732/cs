using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEditor;
using System.Linq;

[CustomEditor(typeof(ItemDatos))]
public class ItemDatosCustomInspector : Editor {

    private ItemDatos scriptPrincipal;

    private void OnEnable()
    {
        scriptPrincipal = (ItemDatos)target;
    }

    public override void OnInspectorGUI()
    {
        base.OnInspectorGUI();

        if(GUILayout.Button("Refrescar todos los Items"))
        {
            RellenarTodosLasEnumeraciones();
        }

    }

    private void RellenarTodosLasEnumeraciones()
    {
        List<int> posicionesABorrar = new List<int>();
        foreach (ItemID item in ItemID.GetValues(typeof(ItemID)))
        {
            if (item != ItemID.NINGUNO)
            {                
                if (scriptPrincipal.datosItems.Count(x => x.ID == item) > 1)
                {
                    var result = Enumerable.Range(0, scriptPrincipal.datosItems.Count)
                             .Where(i => scriptPrincipal.datosItems[i].ID == item)
                             .ToList();

                    result.RemoveAt(0);

                    posicionesABorrar.AddRange(result);
                }
                else if(scriptPrincipal.datosItems.Count(x => x.ID == item) == 0)
                {
                    scriptPrincipal.datosItems.Add(new ItemModelo() { ID = item });
                }                
            }

        }

        if (scriptPrincipal.datosItems.Count(x => x.ID == ItemID.NINGUNO) > 0)
        {
            var result = Enumerable.Range(0, scriptPrincipal.datosItems.Count)
                     .Where(i => scriptPrincipal.datosItems[i].ID == ItemID.NINGUNO)
                     .ToList();
            posicionesABorrar.AddRange(result);
        }

        posicionesABorrar = posicionesABorrar.Distinct().ToList();
        posicionesABorrar.Sort();

        for (int i = posicionesABorrar.Count - 1; i >= 0; i--)
        {
            scriptPrincipal.datosItems.RemoveAt(posicionesABorrar[i]);
        }
    }
}
