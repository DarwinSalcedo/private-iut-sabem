/*!
*darwin salcedo
*/

$(document).ready(function()
		{
		$("#desempenho-form").click(function () {	 
			var n = $( "input:radio[id=Desempenho_num_responsabilidad]:checked" ).val();
			var n1 = $( "input:radio[id=Desempenho_num_productividad]:checked" ).val();
			var n2 = $( "input:radio[id=Desempenho_num_conocimiento]:checked" ).val();
			var n3 = $( "input:radio[id=Desempenho_num_capacidad_delegar]:checked" ).val();
			var n4 = $( "input:radio[id=Desempenho_num_order_planificacion]:checked" ).val();
			var r = parseFloat(n) + parseFloat(n1) + parseFloat(n2) + parseFloat(n3) + parseFloat(n4);
			
			$("input:hidden[id=Desempenho_num_TotDesemPorc]").val(r.toFixed(1));
			$("input:hidden[id=Desempenho_num_TotDesemNota]").val((r*5).toFixed(1));
			$( "#aved" ).text( "Resultados  " + (r.toFixed(1)) + "%  " + ((r*5).toFixed(0)) + " puntos" );

			});


		$("#espiritu-bomberil-form").click(function () {	 
			var n = $( "input:radio[id=EspirituBomberil_num_disciplinado]:checked" ).val();
			var n1 = $( "input:radio[id=EspirituBomberil_num_demuestra_mistica]:checked" ).val();
			var n2 = $( "input:radio[id=EspirituBomberil_num_abnegado]:checked" ).val();
			var n3 = $( "input:radio[id=EspirituBomberil_num_demuestra_inden]:checked" ).val();
			var n4 = $( "input:radio[id=EspirituBomberil_num_demuestra_comp]:checked" ).val();
			var r = parseFloat(n) + parseFloat(n1) + parseFloat(n2) + parseFloat(n3) + parseFloat(n4);
			
			$("input:hidden[id=EspirituBomberil_num_TotEspPorc]").val(r.toFixed(1));
			$("input:hidden[id=EspirituBomberil_num_TotEspNota]").val((r*5).toFixed(1));
			$( "#aveeb" ).text( "Resultados  " + (r.toFixed(1)) + "%  " + ((r*5).toFixed(0)) + " puntos" );

			});

		$("#competencia-form").click(function () {	 
			var n = $( "input:radio[id=Competencia_num_demuestra_eficaz]:checked" ).val();
			var n1 = $( "input:radio[id=Competencia_num_respetado_meritos]:checked" ).val();
			var n2 = $( "input:radio[id=Competencia_num_nunca_decisi_impul]:checked" ).val();
			var n3 = $( "input:radio[id=Competencia_num_habla_diccion_cohe]:checked" ).val();
			var n4 = $( "input:radio[id=Competencia_num_actualizado_bom]:checked" ).val();
			var r = parseFloat(n) + parseFloat(n1) + parseFloat(n2) + parseFloat(n3) + parseFloat(n4);
			
			$("input:hidden[id=Competencia_num_TotComPorc]").val(r.toFixed(1));
			$("input:hidden[id=Competencia_num_TotComNota]").val((r*5).toFixed(1));
			$( "#avec" ).text( "Resultados  " + (r.toFixed(1)) + "%  " + ((r*5).toFixed(0)) + " puntos" );

			});

		$("#aptitud-actitud-form").click(function () {	 
			var n = $( "input:radio[id=AptitudActitud_num_puntualidad_asist]:checked" ).val();
			var n1 = $( "input:radio[id=AptitudActitud_num_presentacion_apar]:checked" ).val();
			var n2 = $( "input:radio[id=AptitudActitud_num_actitud_institucion]:checked" ).val();
			var n3 = $( "input:radio[id=AptitudActitud_num_actitud_superiores]:checked" ).val();
			var n4 = $( "input:radio[id=AptitudActitud_num_cooperacion]:checked" ).val();
			var r = parseFloat(n) + parseFloat(n1) + parseFloat(n2) + parseFloat(n3) + parseFloat(n4);
			
			$("input:hidden[id=AptitudActitud_num_TotApPorc]").val(r.toFixed(1));
			$("input:hidden[id=AptitudActitud_num_TotAcNota]").val((r*5).toFixed(1));
			$( "#aveaa" ).text( "Resultados  " + (r.toFixed(1)) + "%  " + ((r*5).toFixed(0)) + " puntos" );

			});
		
		$("#habilidad-form").click(function () {	 
			var n = $( "input:radio[id=Habilidad_num_carisma_lider]:checked" ).val();
			var n1 = $( "input:radio[id=Habilidad_num_iniciativa_crea]:checked" ).val();
			var n2 = $( "input:radio[id=Habilidad_num_manejo_conflitos]:checked" ).val();
			var n3 = $( "input:radio[id=Habilidad_num_coordinacion]:checked" ).val();
			var n4 = $( "input:radio[id=Habilidad_num_toma_decisiones]:checked" ).val();
			var r = parseFloat(n) + parseFloat(n1) + parseFloat(n2) + parseFloat(n3) + parseFloat(n4);
			
			$("input:hidden[id=Habilidad_num_TotHaPorc]").val(r.toFixed(1));
			$("input:hidden[id=Habilidad_num_TotHaNota]").val((r*5).toFixed(1));
			$( "#aveh" ).text( "Resultados  " + (r.toFixed(1)) + "%  " + ((r*5).toFixed(0)) + " puntos" );

			});
		 });