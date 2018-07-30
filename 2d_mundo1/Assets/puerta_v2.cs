using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class puerta_v2 : MonoBehaviour {

	int index = 0;
	public string[] mensaje_chest = {};
	public string[] mensaje_mision = {};
	public AudioClip item_clip;
	public int numero_tesoros;
    public int numero_items;

    public int getnum_chest(){
    	return numero_tesoros;
    }

    public int getnum_items(){
    	return numero_items;
    }

	public string getMensaje_chest(){
		return mensaje_chest[index];
	}

	public string getMensaje_mision(){
		return mensaje_mision[index];
	}

	public int getTamaChest(){
		return mensaje_chest.Length;
	}

	public int getTamaMision(){
		return mensaje_mision.Length;
	}

	public int getIndex(){
		return index;
	}

	public void setIndex(int i){
		index = i;
	}

	public void boton_next(){
		index += 1;
	}

	public void reproducir(AudioSource audio){
		audio.clip = item_clip;
		audio.Play();
	}



}
