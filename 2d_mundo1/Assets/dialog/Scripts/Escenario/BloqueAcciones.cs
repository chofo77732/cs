using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Events;

[System.Serializable]
public class BloqueAcciones
{    
    [Range(0, 30f)]
    public float tiempoEsperaHastaEjecutarAcciones = 0f;
    public UnityEvent accionesAlCumplirLogro;
}
