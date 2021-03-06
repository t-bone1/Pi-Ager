﻿<!-- Diese Einstellungen werden nur im manuellen Modus eingeblendet -->
<h2 class="art-postheader">Manuelle Werte</h2>
                                <!----------------------------------------------------------------------------------------Betriebsart-->
                                <form method="post">
                                    <div class="hg_container" >
                                        <table style="width: 100%;" class="minischrift">
                                            <tr>
                                                <td class="td_png_icon"><h3>Betriebsart</h3><img src="images/betriebsart.png" alt=""><br><button class="art-button" type="button" onclick="help_betriebsart_blockFunction()">Hilfe</button></td>
                                                <td style=" text-align: left; padding-left: 20px;">
                                                <input type="radio" name="mod" value="0" <?= $checked_0 ?>/><label> Kühlen</label><br>
                                                <input type="radio" name="mod" value="1" <?= $checked_1 ?>/><label> Kühlen mit Befeuchtung</label><br>
                                                <input type="radio" name="mod" value="2" <?= $checked_2 ?>/><label> Heizen mit Befeuchtung</label><br>
                                                <input type="radio" name="mod" value="3" <?= $checked_3 ?>/><label> Automatik mit Befeuchtung</label><br>
                                                <input type="radio" name="mod" value="4" <?= $checked_4 ?>/><label> Automatik mit Be- und Entfeuchtung</label><br><br>
                                                <b>Umluft- und Ablufttimer</b> können unabhängig vom gewählten Modus genutzt werden.
                                                </td>
                                            </tr>
                                        </table>
                                        <script>
                                            function help_betriebsart_blockFunction() {
                                                document.getElementById('help_betriebsart').style.display = 'block';
                                            }
                                            function help_betriebsart_noneFunction() {
                                                document.getElementById('help_betriebsart').style.display = 'none';
                                            }
                                        </script>
                                        <p id="help_betriebsart" class="help_p">
                                            <b>Kühlen:</b>  Es wird auf die eingestellte Temperatur mit Umluft gekühlt.<br><br>
                                            <b>Kühlen mit Befeuchtung:</b>  Es wird auf die eingestellte Temperatur mit Umluft gekühlt und es wird befeuchtet,
                                            die Heizung wird nie angesteuert.<br><br>
                                            <b>Heizen mit Befeuchtung:</b> Es wird auf die eingestellte Temperatur mit Umluft geheizt und und es wird befeuchtet,
                                            die Kühlung wird nie angesteuert.<br><br>
                                            <b>Automatik mit Befeuchtung:</b> Der Reifeschrank kühlt oder heizt mit Umluft je nach eingestelltem Wert und es wird befeuchtet.<br><br>
                                            <b>Automatik mit Be- und Entfeuchtung:</b> Wie Automatik mit Befeuchtung, Zusatz: beim Überschreiten der Luftfeuchte schaltet die Abluft ein, bis das Feuchte-Soll wieder erreicht ist.
                                            Da es sich um eine passive Entfeuchtung handelt, hängt die minimal erreichbare Luftfeuchte von der Trockenheit der Umgebungsluft ab.
                                            Um ein wildes Ein- und Ausschalten zu vermeiden, sollte die Befeuchtung unbedingt verzögert werden (5-10min)!
                                            <br><br>
                                            <button class="art-button" type="button" onclick="help_betriebsart_noneFunction()">Schließen</button>
                                        </p>

                                        <hr>
                                        <!----------------------------------------------------------------------------------------Temperatur-->
                                        <table style="width: 100%;" class="minischrift">
                                            <tr>
                                                <td rowspan="4" class="td_png_icon"><h3>Temperatur</h3><img src="images/heiz_kuehl.png" alt=""><br><button class="art-button" type="button" onclick="help_temperatur_blockFunction()">Hilfe</button></td>
                                                <td class="text_left_padding">Soll-Temperatur:</td>
                                                <td class="text_left_padding"><input name="temp" maxlength="4" size="2" type="text" value=<?=$tempsoll_float?>>°C<span class="display_none" style="font-size: xx-small"> (0 bis 22)</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text_left_padding">Einschaltwert:</td>
                                                <td class="text_left_padding"><input name="temphyston" type="text" maxlength="4" size="2" value=<?=$temphyston?>>°C
                                                    <span class="display_none" style="font-size: xx-small">
                                                        <?PHP
                                                            if($mod == 0 || $mod == 1){
                                                                echo "(Ein bei ".($tempsoll_float+$temphyston)."°C)";
                                                            }
                                                            elseif($mod == 2){
                                                                echo "(Ein bei ".($tempsoll_float-$temphyston)."°C)";
                                                            }
                                                            else {
                                                                echo '(siehe LOGS)';
                                                            }
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text_left_padding">Ausschaltwert:</td>
                                                <td class="text_left_padding"><input name="temphystoff" type="text" maxlength="4" size="2" value= <?=$temphystoff?>>°C
                                                    <span class="display_none" style="font-size: xx-small">
                                                        <?PHP
                                                            if($mod == 0 || $mod == 1){
                                                                echo "(Aus bei ".($tempsoll_float+$temphystoff)."°C)";
                                                            }
                                                            elseif($mod == 2){
                                                                echo "(Aus bei ".($tempsoll_float-$temphystoff)."°C)";
                                                            }
                                                            else {
                                                                echo '(siehe LOGS)';
                                                            }
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                        <script>
                                            function help_temperatur_blockFunction() {
                                                document.getElementById('help_temperatur').style.display = 'block';
                                            }
                                            function help_temperatur_noneFunction() {
                                                document.getElementById('help_temperatur').style.display = 'none';
                                            }
                                        </script>
                                        <p id="help_temperatur" class="help_p">
                                            <b>Solltemperatur:</b> Hier wird die gewünschte Temperatur eingestellt. Der minimale Wert beträgt 0°C, der maximale +22°C.
                                            Technisch bedingt können nicht alle Werte in jeder Betriebsart angefahren werden. Die Umluft ist während der Kühl-oder Heizphasen immer aktiv.<br><br>
                                            <b><u>Schalthysterese</u></b><br>
                                            <b>Einschaltwert:</b> ist der Wert, bei dem die Regelung aktiv wird (Wertgrenze:  0-10°C). Dieser Wert muss immer größer sein, als der Ausschaltwert.<br>
                                            <b>Ausschaltwert:</b> ist der Wert, bei dem die Regelung inaktiv wird (Wertgrenze: 0-10°C)<br>
                                            Um ein wildes Ein- und Ausschalten zu vermeiden, dürfen die Werte nicht gleich sein.
                                            <br><br>
                                            <b>Beispiel für Kühlung:</b> <i>Solltemperatur: 12°C; Einschaltwert: 3°C; Ausschaltwert 1°C</i><br>
                                            Einschalttemperatur = Solltemperatur + Einschaltwert --> 12°C + 3°C = 15°C<br>
                                            Ausschalttemperatur = Solltemperatur + Ausschaltwert --> 12°C + 1°C = 13°C<br>
                                            Wenn also 15 Grad überschritten werden, kühlt der Schrank auf bis 13°C runter und schaltet dann ab, um ein zu starkes nachkühlen zu vermeiden.
                                            Das gesamte Verhalten ist von Schrank zu Schrank unterschiedlich und daher individuell zu ermitteln.
                                            <br><br>
                                            <b>Beispiel für Heizung:</b> <i>Solltemperatur: 22°C; Einschaltwert: 3°C; Ausschaltwert 1°C</i><br>
                                            Einschalttemperatur = Solltemperatur - Einschaltwert --> 22°C - 3°C = 19°C<br>
                                            Ausschalttemperatur = Solltemperatur - Ausschaltwert --> 22°C - 1°C = 21°C<br>
                                            Wenn also 19 Grad unterschritten werden, heizt der Schrank auf bis 21°C auf und schaltet dann ab, um ein zu starkes nachheizen zu vermeiden.
                                            Das gesamte Verhalten ist von Schrank zu Schrank unterschiedlich und daher individuell zu ermitteln.
                                            <br><br>
                                            <b>Automatikmodus:</b> In jedem Automatikmodus wird die Temperatur vollständig automatisch geregelt.
                                            Zunächst wird die aktuelle Temperatur ermittelt. Dann entscheidet sich, welches Verfahren (Kühlen oder Heizen) geeignet ist,
                                            die eingestellte Solltemperatur zu erreichen. Das bedeutet aber auch, dass die Schaltwerte der Hysterese nicht zu eng beieinander
                                            liegen dürfen. Anderenfalls könnten Kühlung und Heizung immer im Wechsel an und ausgeschaltet werden.
                                            <br><br>
                                            <b>Beispiel Automatik:</b> Jetzt wird es spannend!<br>
                                            <i>Solltemperatur: 15°C; Einschaltwert: 5°C; Ausschaltwert 3°C</i><br>
                                            1. Fall: SensorTemperatur >= (Solltemperatur + Einschaltwert [=20°C]) = Kühlung an<br>
                                            2. Fall: SensorTemperatur <= (Solltemperatur + Ausschaltwert [=18°C]) = Kühlung aus<br>
                                            3. Fall: SensorTemperatur >= (Solltemperatur - Einschaltwert [=10°C]) = Heizung an<br>
                                            4. Fall: SensorTemperatur <= (Solltemperatur - Ausschaltwert [=12°C]) = Heizung aus
                                            <br><br>
                                            <b>EMPFEHLUNG:</b> Kontrolle der gespeicherten Werte im Logfile!
                                            <br><br>
                                            <b>ACHTUNG:</b> Nur positive ganze Zahlen verwenden!<br><br>
                                            <button class="art-button" type="button" onclick="help_temperatur_noneFunction()">Schließen</button>
                                        </p>
                                        <hr>
                                        <!----------------------------------------------------------------------------------------Luftfeuchte-->
                                        <div style="<?php if ($mod == 0){print "display: none;";}?>">
                                        <table style="width: 100%;" class="minischrift">
                                            <tr>
                                                <td rowspan="4" class="td_png_icon"><h3>Luftfeuchte</h3><img src="images/befeuchtung.png" alt=""><br><button class="art-button" type="button" onclick="help_befeuchtung_blockFunction()">Hilfe</button></td>
                                                <td class="text_left_padding">Soll-Feuchtigkeit</td>
                                                <td class="text_left_padding"><input name="hum" maxlength="4" size="2" type="text" value=<?=$humsoll_float?>>%<span class="display_none" style="font-size: xx-small"> (0 bis 99)</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text_left_padding">Einschaltwert:</td>
                                                <td class="text_left_padding"><input name="humhyston" maxlength="3" size="2" type="text" value=<?=$humhyston?>>%<span class="display_none" style="font-size: xx-small">
                                                <?PHP
                                                            if($mod == 0 || $mod == 1 || $mod == 2){
                                                                echo "(Ein bei ".($humsoll_float-$humhyston)."%)";
                                                            }
                                                            else {
                                                                echo '(siehe LOGS)';
                                                            }
                                                ?>
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td class="text_left_padding">Ausschaltwert:</td>
                                                <td class="text_left_padding"><input name="humhystoff" maxlength="3" size="2" type="text" value=<?=$humhystoff?>>%<span class="display_none" style="font-size: xx-small">
                                                <?PHP
                                                            if($mod == 0 || $mod == 1 || $mod == 2){
                                                                echo "(Aus bei ".($humsoll_float-$humhystoff)."%)";
                                                            }
                                                            else {
                                                                echo '(siehe LOGS)';
                                                            }
                                                ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="text_left_padding">Verzögerung:</td>
                                                <td class="text_left_padding"><input name="humdelay" maxlength="2" size="2" type="text" value=<?=$humdelay?>>Min<span class="display_none" style="font-size: xx-small"> (0 bis 60)</span></td>
                                            </tr>
                                        </table>
                                        <script>
                                            function help_befeuchtung_blockFunction() {
                                                document.getElementById('help_befeuchtung').style.display = 'block';
                                            }
                                            function help_befeuchtung_noneFunction() {
                                                document.getElementById('help_befeuchtung').style.display = 'none';
                                            }
                                        </script>
                                        <p id="help_befeuchtung" class="help_p">
                                            <b>Sollfeuchtigkeit:</b> Hier wird die gewünschte Luftfeuchte eingestellt. Der minimale Wert beträgt theoretisch 0% und maximal 99%.
                                            Diese Werte werden aber in der Regel nie erreicht werden. Die Umluft ist während der Befeuchtung immer aktiv. Die Wirksamkeit der Entfeuchtung (Automatikmodus mit mit Be- und Entfeuchtung) ist abhängig von der Umgebungsluftfeuchte, da nur eine passive Entfeuchtung durch Abluft stattfindet.<br><br>
                                            <b><u>Schalthysterese</u></b><br>
                                            <b>Einschaltwert:</b> ist der Wert, bei dem die Regelung aktiv wird (Wertgrenze: 0-10%)<br>
                                            <b>Ausschaltwert:</b> ist der Wert, bei dem die Regelung inaktiv wird (Wertgrenze:0-10%)<br>
                                            Um ein wildes Ein- und Ausschalten zu vermeiden, dürfen die Werte nicht gleich sein.
                                            <br><br>
                                            <b>Verzögerung:</b> hier wird die Verzögerungszeit eingestellt, bis der Befeuchter bei zu niedriger Luftfeuchtigkeit einschaltet.
                                            Damit kann die kurzeitig fallende Luftfeuchtigkeit beim "Kühlen", beim "Timer-Abluft" oder "Entfeuchten" ausgeblendet werden. Der minimale Wert beträgt 0 Minuten, der maximale 60 Minuten.
                                            <br><br>
                                            <b>Beispiel:</b> <i>Sollfeuchtigkeit: 75%; Einschaltwert: 5%; Ausschaltwert 1%</i><br>
                                            Einschaltfeuchtigkeit = Sollfeuchtigkeit - Einschaltwert --> 75% - 5% = 70%<br>
                                            Ausschaltfeuchtigkeit = Sollfeuchtigkeit - Ausschaltwert --> 75% - 1% = 74%<br>
                                            Verzögerung = 5 Minuten<br>
                                            Wenn also 70% Luftfeuchtigkeit unterschritten werden, wartet die Regelung 5 Minuten ab. Erst dann befeuchtet der Schrank die Luft bis auf 74% und schaltet anschließend Befeuchtung wieder ab.
                                            <br><br>
                                            <b>Beispiel Automatikmodus mit mit Be- und Entfeuchtung:</b> In diesem Automatikmodus wird die Luftfeuchtigkeit vollständig automatisch geregelt.
                                            Zunächst wird die aktuelle Luftfeuchtigkeit ermittelt. Dann entscheidet sich, welches Verfahren (Be- und Entfeuchtung) geeignet ist,
                                            die eingestellte Soll-Feuchtigkeit zu erreichen. Das bedeutet aber auch, dass die Schaltwerte der Hysterese nicht zu eng beieinander
                                            liegen dürfen. Anderenfalls könnten Befeuchtung und Entfeuchtung immer im Wechsel an und ausgeschaltet werden.
                                            <br><br>
                                            <b>EMPFEHLUNG:</b> Kontrolle der gespeicherten Werte im Logfile!
                                            <br><br>
                                            <b>ACHTUNG:</b> Nur positive ganze Zahlen verwenden!<br><br>
                                            <button class="art-button" type="button" onclick="help_befeuchtung_noneFunction()">Schließen</button>
                                        </p>
                                        <hr>
                                        </div>
                                        <!----------------------------------------------------------------------------------------Umluft-->
                                        <table style="width: 100%;" class="minischrift">
                                            <tr>
                                                <td rowspan="4" class="td_png_icon"><h3>Timer Umluft</h3><img src="images/luftumwaelzung.png" alt=""><br><button class="art-button" type="button" onclick="help_umluft_blockFunction()">Hilfe</button></td>
                                                <td class="text_left_padding">Periode alle </td>
                                                <td class="text_left_padding"><input type="text" size="3" maxlength="4" name="tempoff" value=<?=round($tempoff)?>>Min<span class="display_none" style="font-size: xx-small"> (0 bis 1440)</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text_left_padding">für die Dauer von</td>
                                                <td class="text_left_padding"><input type="text" maxlength="4" size="3" name="tempon" value=<?=$tempon?>>Min<span class="display_none" style="font-size: xx-small"> (0=aus)</span></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                        <script>
                                            function help_umluft_blockFunction() {
                                                document.getElementById('help_umluft').style.display = 'block';
                                            }
                                            function help_umluft_noneFunction() {
                                                document.getElementById('help_umluft').style.display = 'none';
                                            }
                                        </script>
                                        <p id="help_umluft" class="help_p">
                                            <b>Periode:</b> Hier wird die Pausenzeit eingestellt, die bis zum erneuten Einschalten der Umluft abgewartet wird. Bei Wert 0 (= keine Pause) ist die Umluft dauerhaft eingeschaltet. Der maximale Wert liegt bei 1440min.
                                            <br><br>
                                            <b>Dauer:</b> Hier wird die Umluftzeit eingestellt, während der der Lüfter läuft. Bei Wert 0 ist die Umluft-Timerfunktion ausgeschaltet. Der maximale Wert beträgt 1440min.
                                            <br><br>
                                            <b>Hinweis:</b> Der Umluft-Lüfter läuft -unabhängig von den Timereinstellungen- außerdem auch während der Kühlung, Heizung und Befeuchtung.
                                            <br><br>
                                            <b>ACHTUNG:</b><br>
                                            Periode=0 und Dauer=0 ist nicht sinnvoll und nicht erlaubt.<br><br>
                                            <button class="art-button" type="button" onclick="help_umluft_noneFunction()">Schließen</button>
                                        </p>
                                        <hr>
                                        <!----------------------------------------------------------------------------------------Abluft-->
                                        <table style="width: 100%;" class="minischrift">
                                            <tr>
                                                <td rowspan="4" class="td_png_icon"><h3>Timer Abluft</h3><img src="images/luftaustausch.png" alt=""><br><button class="art-button" type="button" onclick="help_abluft_blockFunction()">Hilfe</button></td>
                                                <td class="text_left_padding">Periode alle </td>
                                                <td class="text_left_padding"><input type="text" size="3" maxlength="4" name="tempoff1" value=<?=round($tempoff1)?>>Min<span class="display_none" style="font-size: xx-small"> (0 bis 1440)</span></td>
                                            </tr>
                                            <tr><td class="text_left_padding">für die Dauer von</td>
                                                <td class="text_left_padding"><input type="text" maxlength="4" size="3" name="tempon1" value=<?=$tempon1?>>Min<span class="display_none" style="font-size: xx-small"> (0=aus)</span></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                        <script>
                                            function help_abluft_blockFunction() {
                                                document.getElementById('help_abluft').style.display = 'block';
                                            }
                                            function help_abluft_noneFunction() {
                                                document.getElementById('help_abluft').style.display = 'none';
                                            }
                                        </script>
                                        <p id="help_abluft" class="help_p">
                                            <b>Periode:</b> Hier wird die Pausenzeit eingestellt, die bis zum erneuten Einschalten der Abluft abgewartet wird. Bei Wert 0 (= keine Pause) ist die Abluft dauerhaft eingeschaltet. Der maximale Wert liegt bei 1440min.
                                            <br><br>
                                            <b>Dauer:</b> Hier wird die Abluftzeit eingestellt, während der der Lüfter läuft. Bei Wert 0 ist die Abluft-Timerfunktion ausgeschaltet. Der maximale Wert beträgt 1440min.
                                            <br><br>
                                            <b>Hinweis:</b> Der Abluft-Lüfter läuft -unabhängig von den Timereinstellungen- außerdem auch während der Entfeuchtung im Modus "Automatik mit Be- und Entfeuchtung".
                                            <br><br>
                                            <b>ACHTUNG:</b><br>
                                            Periode=0 und Dauer=0 ist nicht sinnvoll und nicht erlaubt.<br><br>
                                            <button class="art-button" type="button" onclick="help_abluft_noneFunction()">Schließen</button>
                                        </p>
                                        <hr>
                                        <!----------------------------------------------------------------------------------------Sensortyp-->
                                        <table style="width: 100%;" class="minischrift">
                                            <tr>
                                                <td class="td_png_icon"><h3>Sensortyp</h3><img src="images/sensortype.png" alt=""><br><button class="art-button" type="button" onclick="help_sensortyp_blockFunction()">Hilfe</button>
                                                </td>
                                                <td style=" text-align: left; padding-left: 20px;">
                                                    <input type="radio" name="sensortype" value="1" <?= $checked_sens_1 ?>/><label> DHT11</label><br>
                                                    <input type="radio" name="sensortype" value="2" <?= $checked_sens_2 ?>/><label> DHT22</label><br>
                                                    <input type="radio" name="sensortype" value="3" <?= $checked_sens_3 ?>/><label> SHT75</label><br>
                                                    <br>
                                                </td>
                                                <td class="td_submitbutton">
                                                    <input class="art-button" type="submit" value="Speichern" />
                                                </td>
                                            </tr>
                                        </table>
                                        <script>
                                            function help_sensortyp_blockFunction() {
                                                document.getElementById('help_sensortyp').style.display = 'block';
                                            }
                                            function help_sensortyp_noneFunction() {
                                                document.getElementById('help_sensortyp').style.display = 'none';
                                            }
                                        </script>
                                        <p id="help_sensortyp" class="help_p">
                                            <b>Sensotyp:</b> Schließe deinen Sensor nach Anleitung an und wähle hier den richtigen Typ aus.
                                            <br><br>
                                            <button class="art-button" type="button" onclick="help_sensortyp_noneFunction()">Schließen</button>
                                        </p>
                                    </div>
                                </form>
