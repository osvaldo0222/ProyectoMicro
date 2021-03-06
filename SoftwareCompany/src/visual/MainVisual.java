package visual;

import java.awt.Dimension;
import java.awt.EventQueue;
import java.awt.Toolkit;

import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JMenuBar;
import javax.swing.JMenu;
import javax.swing.JMenuItem;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.ImageIcon;

public class MainVisual {

	private JFrame frame;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					MainVisual window = new MainVisual();
					Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
				    int height = screenSize.height;
				    int width = screenSize.width;
				    window.frame.setSize(width, height-43);
				    window.frame.setLocationRelativeTo(null);
				    
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public MainVisual() {
		initialize();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(100, 100, 450, 300);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		JMenuBar menuBar = new JMenuBar();
		frame.setJMenuBar(menuBar);
		
		JMenu mnNewMenu = new JMenu("Archivo");
		menuBar.add(mnNewMenu);
		
		JMenu mnProyectos = new JMenu("Proyectos");
		menuBar.add(mnProyectos);
		
		JMenuItem mntmNuevoProyecto = new JMenuItem("Nuevo Proyecto");
		mntmNuevoProyecto.setIcon(new ImageIcon(MainVisual.class.getResource("/Imgs/newProject30.png")));
		mntmNuevoProyecto.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				ProjectRegistration dialog = new ProjectRegistration();
				
			   dialog.setSize(598, 434);
			   dialog.setResizable(false);
			   dialog.setLocationRelativeTo(null);
				
				dialog.setVisible(true);
			}
		});
		mnProyectos.add(mntmNuevoProyecto);
		
		JMenu mnTrabajadores = new JMenu("Trabajadores");
		menuBar.add(mnTrabajadores);
		
		JMenuItem mntmRegistrar = new JMenuItem("Nuevo Trabajador");
		mntmRegistrar.setIcon(new ImageIcon(MainVisual.class.getResource("/Imgs/worker30px.png")));
		mntmRegistrar.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				WorkerRegistration registration = new WorkerRegistration();
				registration.setModal(true);
				registration.setVisible(true);
			}
		});
		mnTrabajadores.add(mntmRegistrar);
		
		JMenu mnClientes = new JMenu("Clientes");
		menuBar.add(mnClientes);
		
		JMenuItem mntmNuevoCliente = new JMenuItem("Nuevo Cliente");
		mntmNuevoCliente.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				ClientRegistration registration = new ClientRegistration();
				registration.setModal(true);
				registration.setVisible(true);
			}
		});
		mntmNuevoCliente.setIcon(new ImageIcon(MainVisual.class.getResource("/Imgs/user30px.png")));
		mnClientes.add(mntmNuevoCliente);
	}

}
