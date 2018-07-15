using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Events;

[System.Serializable]
public class FasesEscenario {

    public Logro logroConseguido;
    public GameObject[] objetosActivos;
    public GameObject[] objetosInactivos;

    public void ActivarFase()
    {
        for (int i = 0; i < objetosActivos.Length; i++)
        {
            objetosActivos[i].SetActive(true);
        }
        for (int i = 0; i < objetosInactivos.Length; i++)
        {
            objetosInactivos[i].SetActive(false);
        }
    }
}
