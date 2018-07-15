using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[CreateAssetMenu]
public class AtaqueDatos : ScriptableObject {

    public AtaqueID ataqueID;
    public AtaqueElemento ataqueElemento;
    public AtaqueTipo ataqueTipo;
    [Range(5, Ajustes.usosMaximoAtaquesPokemon)]
    public int usosHabilidad;
    [Range(10, Ajustes.poderMaximoAtaquePokemon)]
    public int poderHabilidad;
    public AudioClip sonido;
    public Sprite sprite;


}
