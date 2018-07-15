using UnityEngine;
using UnityEditor;
using UnityEditorInternal;
using System.IO;

[CustomEditor(typeof(NPC))]
public class LevelDataEditor : Editor {

    private ReorderableList reorderableList;

    private NPC npc;
    private GUIStyle style;

    private void OnEnable()
    {
        npc = (NPC)target;
        if (npc.listaConversaciones == null)
            npc.listaConversaciones = new System.Collections.Generic.List<Conversacion>();
        reorderableList = new ReorderableList(serializedObject, serializedObject.FindProperty("listaConversaciones"), true, true, true, true);
        reorderableList.elementHeight = EditorGUIUtility.singleLineHeight + (18 * 15);
        style = new GUIStyle();
        style.normal.textColor = Color.white;
        style.fontStyle = FontStyle.Bold;
        // This could be used aswell, but I only advise this your class inherrits from UnityEngine.Object or has a CustomPropertyDrawer
        // Since you'll find your item using: serializedObject.FindProperty("list").GetArrayElementAtIndex(index).objectReferenceValue
        // which is a UnityEngine.Object
        // reorderableList = new ReorderableList(serializedObject, serializedObject.FindProperty("list"), true, true, true, true);

        // Add listeners to draw events
        reorderableList.drawHeaderCallback += DrawHeader;
        reorderableList.drawElementCallback += DrawElement;

        reorderableList.onAddCallback += AddItem;
        reorderableList.onRemoveCallback += RemoveItem;
    }

    private void OnDisable()
    {
        // Make sure we don't get memory leaks etc.
        reorderableList.drawHeaderCallback -= DrawHeader;
        reorderableList.drawElementCallback -= DrawElement;

        reorderableList.onAddCallback -= AddItem;
        reorderableList.onRemoveCallback -= RemoveItem;
    }

    /// <summary>
    /// Draws the header of the list
    /// </summary>
    /// <param name="rect"></param>
    private void DrawHeader(Rect rect)
    {

        GUI.Label(rect, "Lista de conversaciones por logro");
    }

    /// <summary>
    /// Draws one element of the list (ListItemExample)
    /// </summary>
    /// <param name="rect"></param>
    /// <param name="index"></param>
    /// <param name="active"></param>
    /// <param name="focused"></param>
    private void DrawElement(Rect rect, int index, bool active, bool focused)
    {
        Conversacion item = npc.listaConversaciones[index];

        EditorGUI.BeginChangeCheck();

        item.logroConseguido = (Logro)EditorGUI.EnumPopup(new Rect(rect.x, rect.y, rect.width, 18), new GUIContent("Logro Requerido", "Si ha cumplido este logro mostrará este diálogo"), item.logroConseguido);
        EditorGUI.HelpBox(new Rect(rect.x, rect.y + (18 * 2), rect.width, (18)), "Mensaje NPC. Si es un combate lo dirá antes de combatir", MessageType.Info);
        item.texto = EditorGUI.TextArea(new Rect(rect.x, rect.y + (18 * 3), rect.width, (18 * 4)), item.texto);
        item.tipoConversacion = (TipoConversacion)EditorGUI.EnumPopup(new Rect(rect.x, rect.y + 18, rect.width, 18), new GUIContent("Tipo Conversación"), item.tipoConversacion);
        item.darLogroPorTerminarConversacion = (Logro)EditorGUI.EnumPopup(new Rect(rect.x, rect.y + (18 * 7), rect.width, 18), new GUIContent("Logro al terminar conversacion/combate", "Al terminar la conversación el jugador recibirá este logro"), item.darLogroPorTerminarConversacion);
        if (item.darLogroPorTerminarConversacion != Logro.NINGUNO)
        {
            item.darItemPorTerminarConversacion = (ItemID)EditorGUI.EnumPopup(new Rect(rect.x, rect.y + (18 * 8), rect.width, 18), new GUIContent("Item al terminar conversación/combate", "Al terminar la conversación recibirá este objeto"), item.darItemPorTerminarConversacion);
            if (item.darItemPorTerminarConversacion != ItemID.NINGUNO)
                item.cantidadDeItems = EditorGUI.IntField(new Rect(rect.x, rect.y + (18 * 9), rect.width, 18), "Cantidad del item anterior", item.cantidadDeItems);
        }
        

        if (item.tipoConversacion == TipoConversacion.Luchar && item.darLogroPorTerminarConversacion != Logro.NINGUNO)
        {
            EditorGUI.HelpBox(new Rect(rect.x, rect.y + (18 * 10), rect.width, (18)), "Mensaje tras ganar el combate", MessageType.Info);
            item.texto2 = EditorGUI.TextArea(new Rect(rect.x, rect.y + (18 * 11), rect.width, (18 * 4)), item.texto2);
            item.dineroRecompensa = EditorGUI.IntField(new Rect(rect.x, rect.y + (18 * 15), rect.width, 18), "Dinero Recompensa", item.dineroRecompensa);
        }
        else if(item.tipoConversacion == TipoConversacion.Luchar)
        {
            EditorGUI.HelpBox(new Rect(rect.x, rect.y + (18 * 10), rect.width, (18 * 3)), "Un NPC que lucha siempre debe dar un logro al terminar, si no se podrá luchar con él repetidas veces", MessageType.Error);
            Debug.LogError(string.Concat("El NPC ", npc.gameObject.name, " tiene marcado un diálogo de tipo combate pero no se ha asignado un logro al finalizar"));
        }

        if (EditorGUI.EndChangeCheck())
        {
            EditorUtility.SetDirty(target);
        }


        //item.logroConseguido = (Logro)EditorGUI.EnumPopup(new Rect(rect.x, rect.y, ((rect.width / 3) * 1), new GUIContent("Logro cumplido", "Si ha cumplido este logro mostrará este diálogo"), rect.height), item.logroConseguido);
        //item.texto = EditorGUI.TextArea(new Rect(rect.x + ((rect.width / 3) * 1), rect.y, ((rect.width / 3) * 2), rect.height), item.texto);
        // If you are using a custom PropertyDrawer, this is probably better
        // EditorGUI.PropertyField(rect, serializedObject.FindProperty("list").GetArrayElementAtIndex(index));
        // Although it is probably smart to cach the list as a private variable ;)
    }

    private void AddItem(ReorderableList list)
    {
        npc.listaConversaciones.Add(new Conversacion());        
        EditorUtility.SetDirty(target);        
    }

    private void RemoveItem(ReorderableList list)
    {
        npc.listaConversaciones.RemoveAt(list.index);
        EditorUtility.SetDirty(target);
    }

    public override void OnInspectorGUI()
    {
        base.OnInspectorGUI();
        // Actually draw the list in the inspector
        reorderableList.DoLayoutList();       
    }

    //private void OnSceneGUI()
    //{
    //    string conversacionesLogros = string.Empty;

    //    for (int i = 0; i < npc.listaConversaciones.Count; i++)
    //    {
    //        conversacionesLogros = string.Concat(conversacionesLogros, npc.listaConversaciones[i].logroConseguido.ToString(), " - ");
    //    }        

    //    Handles.Label(npc.transform.position, string.Concat(conversacionesLogros), style);
    //}
}