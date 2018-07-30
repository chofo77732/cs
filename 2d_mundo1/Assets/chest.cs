using System;
using System.Linq;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class chest : MonoBehaviour {

	public GameObject ventanaDialogo;
    public Text campoDeTexto;   
    //public GameObject info_chest;
    public GameObject boton;

    public GameObject menu;

    public string mensaje1;
    public string mensaje2;
    public string mensaje3;
    public string mensaje4;

	public AudioClip item_clip;

	AudioSource audio;

 	int i = 0;
	// Use this for initialization

 	//mensaje_chest chest_info;
 	Button btn1;
	void Start () {

		//chest_info = info_chest.GetComponent<mensaje_chest>();
		btn1 = boton.GetComponent<Button>();
		audio = GetComponent<AudioSource>();
		btn1.onClick.AddListener(TaskOnClick);
	}

	void TaskOnClick()
    {
    	
        //Output this to console when the Button is clicked
        //Debug.Log("You have clicked the button! "+i);
        if(i==0){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mensaje1;
			 }else if(i==1){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mensaje2;
			 }else if(i==2){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mensaje3;

			 }else if(i==3){
			 	audio.clip = item_clip;
				audio.Play();
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mensaje4;
				

			 }else if(i==4){
			 	i=0;
				campoDeTexto.text = string.Empty;
				ventanaDialogo.SetActive(false);
				menu.SetActive(true);
				Time.timeScale = 1; 
				gameObject.SetActive(false);
			 }
			 i++;
    }




void OnTriggerEnter2D(Collider2D col){
	
		if(col.gameObject.tag == "Player"){						
			ventanaDialogo.SetActive(true);
			campoDeTexto.text = string.Empty;
			campoDeTexto.text = mensaje1;
			menu.SetActive(false);
			Time.timeScale = 0; 
		}
	}
}
