using System;
using System.Linq;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.Assertions;
using UnityEngine.UI;

public class puerta : MonoBehaviour {

	public Text count_chest; 
	public GameObject ventanaDialogo;
    public Text campoDeTexto;   
    public GameObject mision;
    public GameObject boton;
    public string numero_tesoros;

    public GameObject menu;
 	int i = 0;
	// Use this for initialization

 	mision_text mt;
 	Button btn1;
	void Start () {
		mt = mision.GetComponent<mision_text>();
		btn1 = boton.GetComponent<Button>();

		btn1.onClick.AddListener(TaskOnClick);
	}

	void TaskOnClick()
    {
    	i++;
        //Output this to console when the Button is clicked
        //Debug.Log("You have clicked the button! "+i);
        if(i==0){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mt.mensaje2;
			 }else if(i==1){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mt.mensaje2;
			 }else if(i==2){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mt.mensaje3;

			 }else if(i==3){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = mt.mensaje4;

			 }else if(i==4){
			 	i=0;
				campoDeTexto.text = string.Empty;
				ventanaDialogo.SetActive(false);
				menu.SetActive(true);
				Time.timeScale = 1; 
			 }
    }




void OnTriggerEnter2D(Collider2D col){
	
		if(col.gameObject.tag == "Player"){						
			if(count_chest.text == numero_tesoros){

				 SceneManager.LoadScene("escena1");
			}else{

//Debug.Log("new num "+i);
				ventanaDialogo.SetActive(true);
				menu.SetActive(false);
				Time.timeScale = 0; 
				//mt.mostrar();
				
/*
				if(i==0){
				ventanaDialogo.SetActive(true);
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = "Remplazo de texto";
				
			 }else if(i==1){
				Debug.Log("new num "+i);
			 }else if(i==2){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = "Remplazo de texto 2";
				Debug.Log("new num "+i);

			 }else if(i==3){
				campoDeTexto.text = string.Empty;
				campoDeTexto.text = "Hola mundo :3";
				Debug.Log("new num "+i);

			 }else if(i==4){
			 	i=0;
				campoDeTexto.text = string.Empty;
				ventanaDialogo.SetActive(false);
			 }
			 */
			
		}

	}



	}
}
