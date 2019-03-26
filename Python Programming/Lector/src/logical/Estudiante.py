'''
Created on Mar 21, 2019

@author: 20161229
'''

class Estudiante(object):
    def __init__(self, matricula, nombre, cedula, correo, telefono, carrera):
        self.__matricula = matricula
        self.__nombre = nombre
        self.__cedula = cedula
        self.__correo = correo
        self.__telefono = telefono
        self.__carrera = carrera
        self.__llego = False
        self.__presente = False

    def get_matricula(self):
        return self.__matricula


    def get_nombre(self):
        return self.__nombre


    def get_cedula(self):
        return self.__cedula


    def get_correo(self):
        return self.__correo


    def get_telefono(self):
        return self.__telefono


    def get_carrera(self):
        return self.__carrera


    def get_llego(self):
        return self.__llego


    def get_presente(self):
        return self.__presente


    def set_matricula(self, value):
        self.__matricula = value


    def set_nombre(self, value):
        self.__nombre = value


    def set_cedula(self, value):
        self.__cedula = value


    def set_correo(self, value):
        self.__correo = value


    def set_telefono(self, value):
        self.__telefono = value


    def set_carrera(self, value):
        self.__carrera = value


    def set_llego(self, value):
        self.__llego = value


    def set_presente(self, value):
        self.__presente = value


    def del_matricula(self):
        del self.__matricula


    def del_nombre(self):
        del self.__nombre


    def del_cedula(self):
        del self.__cedula


    def del_correo(self):
        del self.__correo


    def del_telefono(self):
        del self.__telefono


    def del_carrera(self):
        del self.__carrera


    def del_llego(self):
        del self.__llego


    def del_presente(self):
        del self.__presente
        