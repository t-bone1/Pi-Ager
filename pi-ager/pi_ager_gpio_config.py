#!/usr/bin/python3
import RPi.GPIO as gpio
import pi_ager_names
import pi_ager_logging

global logger
logger = pi_ager_logging.create_logger(__name__)
logger.debug('logging initialised')

# Function Setup GPIO
def setupGPIO():
    global logger
    logstring = 'setupGPIO()'
    logger.debug(logstring)
    gpio.setwarnings(False)
    
    # Board mode wird gesetzt
    gpio.setmode(pi_ager_names.board_mode)
    
    # Einstellen der GPIO PINS
    # Sensoren etc
    gpio.setup(pi_ager_names.gpio_scale_data, gpio.IN)             # Scale Data ()
    gpio.setup(pi_ager_names.gpio_scale_sync, gpio.OUT)            # Scale Sync ()
    
    # Relaisboard
    gpio.setup(pi_ager_names.gpio_heater, gpio.OUT)                # Heizung setzen
    gpio.setup(pi_ager_names.gpio_cooling_compressor, gpio.OUT)    # Kuehlung setzen
    gpio.setup(pi_ager_names.gpio_circulating_air, gpio.OUT)       # Umluft setzen
    gpio.setup(pi_ager_names.gpio_humidifier, gpio.OUT)            # Befeuchter setzen
    gpio.setup(pi_ager_names.gpio_exhausting_air, gpio.OUT)        # Abluft setzen
    gpio.setup(pi_ager_names.gpio_light, gpio.OUT)                 # Licht setzen
    gpio.setup(pi_ager_names.gpio_uv, gpio.OUT)                    # UV-Licht setzen
    gpio.setup(pi_ager_names.gpio_dehumidifier, gpio.OUT)          # Dehumidifier setzen

def defaultGPIO():
    global logger
    logstring = 'defaultGPIO()'
    logger.debug(logstring)
    
    gpio.output(pi_ager_names.gpio_heater, pi_ager_names.relay_off)              # Heizung Relais standardmaessig aus
    gpio.output(pi_ager_names.gpio_cooling_compressor, pi_ager_names.relay_off)  # Kuehlung Relais standardmaessig aus
    gpio.output(pi_ager_names.gpio_circulating_air, pi_ager_names.relay_off)     # Umluft Relais standardmaessig aus
    gpio.output(pi_ager_names.gpio_humidifier, pi_ager_names.relay_off)          # Befeuchter Relais standardmaessig aus
    gpio.output(pi_ager_names.gpio_exhausting_air, pi_ager_names.relay_off)      # Abluft Relais standardmaessig aus
    gpio.output(pi_ager_names.gpio_light, pi_ager_names.relay_off)               # Licht Relais standardmaessig aus
    gpio.output(pi_ager_names.gpio_uv, pi_ager_names.relay_off)                  # UV-Licht Relais standardmaessig aus
    gpio.output(pi_ager_names.gpio_dehumidifier, pi_ager_names.relay_off)        # Reserve Relais standardmaessig aus
    
def gpio_is_in_use():
    gpio_exhausting_air_usage = gpio.gpio_function(pi_ager_names.gpio_exhausting_air)
    gpio_circulating_air_usage = gpio.gpio_function(pi_ager_names.gpio_circulating_air)
    gpio_cooling_compressor_usage = gpio.gpio_function(pi_ager_names.gpio_cooling_compressor)
    gpio_dehumidifier_usage = gpio.gpio_function(pi_ager_names.gpio_dehumidifier)
    gpio_heater_usage = gpio.gpio_function(pi_ager_names.gpio_heater)
    gpio_humidifier_usage = gpio.gpio_function(pi_ager_names.gpio_humidifier)
    gpio_light_usage = gpio.gpio_function(pi_ager_names.gpio_light)
    gpio_uv_usage = gpio.gpio_function(pi_ager_names.gpio_uv)
    
    if gpio_uv_usage != -1 or gpio_light_usage != -1 or gpio_humidifier_usage != -1 or gpio_heater_usage != -1 or gpio_dehumidifier_usage != -1 or gpio_cooling_compressor_usage != -1 or gpio_circulating_air_usage != -1 or gpio_exhausting_air_function != -1:
        return True
    else:
        return False