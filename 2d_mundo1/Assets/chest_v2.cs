using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class chest_v2 : MonoBehaviour {

	int index = 0;
	public string[] msg = {	};
	public AudioClip item_clip;

	public string getMensaje(){
		//pause();
		return msg[index];

	}

	public void pause(){
	Time.timeScale = 0; 
	}

	public int getTama(){
		return msg.Length;
	}

	public int getIndex(){
		return index;
	}

	public void boton_next(){
		index += 1;
	}

	public void reproducir(AudioSource audio){
		audio.clip = item_clip;
		audio.Play();
	}

}
